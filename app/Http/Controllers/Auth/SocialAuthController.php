<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    /**
     * Redirect the user to the OAuth Provider's authentication page.
     *
     * @param string $provider
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function redirect(string $provider)
    {
        if (!in_array($provider, ['google', 'microsoft', 'github', 'x', 'discord'])) {
            return redirect()->route('login')->with('error', 'The selected OAuth provider is not supported.');
        }

        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from the OAuth Provider and log the user in.
     *
     * @param string $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback(string $provider)
    {
        // Verify provider is supported
        if (!in_array($provider, ['google', 'microsoft', 'github', 'x', 'discord'])) {
            return redirect()->route('login')->with('error', 'The selected OAuth provider is not supported.');
        }

        // Authenticate user using Laravel Socialite
        try {
            $socialUser = Socialite::driver($provider)->stateless()->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Authentication via ' . $provider . ' failed.');
        }

        $email = $socialUser->getEmail();
        $socialId = $socialUser->getId();

        if (!$email) {
            return redirect()->route('login')->with('error', 'Could not retrieve email address from ' . $provider . '.');
        }

        // Retrieve or link the user based on social account
        $socialAccount = SocialAccount::where('provider_name', $provider)
            ->where('provider_id', $socialId)
            ->first();

        if ($socialAccount) {
            $user = $socialAccount->user;
        } else {
            // Retrieve user by email
            $user = User::where('email', $email)->first();

            if ($user) {
                // Link the social account to the existing email account
                $user->socialAccounts()->create([
                    'provider_name' => $provider,
                    'provider_id' => $socialId,
                ]);
            } else {
                // Registration flow for a completely new user.
                $user = User::create([
                    'name' => $socialUser->getName() ?? explode('@', $email)[0],
                    'email' => $email,
                ]);

                // Link the social account to the new user
                $user->socialAccounts()->create([
                    'provider_name' => $provider,
                    'provider_id' => $socialId,
                ]);
            }
        }

        // Mark email as verified if not already verified
        if (!$user->email_verified_at) {
            $user->email_verified_at = now();
            $user->save();
        }

        // Log the user in (Web Session)
        auth()->login($user, true);

        // Redirect to the intended page or home (dashboard in Breeze)
        return redirect()->intended('/dashboard')->with('success', 'Logged in successfully.');
    }
}
