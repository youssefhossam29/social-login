# Laravel Social Login Starter

This repository contains the source code for a Laravel-based project that demonstrates how to effectively implement social authentication using Laravel Socialite. It provides a seamless way for users to log in or register using their existing accounts from various platforms.

## Overview

This Laravel project introduces a clean and practical approach to handling authentication in modern applications using:

- Laravel Socialite for OAuth authentication
- Laravel Breeze for scaffolding default authentication views and logic
- Multiple OAuth providers support (Google, Microsoft, Github, X/Twitter, Discord)
- Automatic linking of multiple social accounts to a single user via email

## Features

- Traditional Email/Password registration and login
- Social Authentication with:
  - Google
  - Microsoft
  - Github
  - X (Twitter)
  - Discord
- Automatic linking of social accounts to existing users with the same email address
- Modern, simple, and elegant UI built with Tailwind CSS
- Pre-configured Laravel Breeze Authentication

## Technologies

- PHP 8.2+  
- Laravel 11  
- MySQL / SQLite  
- Composer  
- Tailwind CSS

## Getting Started

Follow these steps to set up the project locally:

1. **Clone the Repository**

   ```bash
   git clone https://github.com/youssefhossam29/social-login.git
   cd social-login
   ```

2. **Install Dependencies**

   ```bash
   composer install
   npm install && npm run build
   ```

3. **Configure Environment**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

   * Edit `.env` and configure your database settings.
   * Configure your OAuth credentials to test the social login features. Add or update the following keys in your `.env` file (you will need to obtain these credentials from the respective provider's developer consoles):
     ```env
     GOOGLE_CLIENT_ID=your_google_client_id
     GOOGLE_CLIENT_SECRET=your_google_client_secret
     GOOGLE_REDIRECT_URI="${APP_URL}/auth/google/callback"

     MICROSOFT_CLIENT_ID=your_microsoft_client_id
     MICROSOFT_CLIENT_SECRET=your_microsoft_client_secret
     MICROSOFT_REDIRECT_URI="${APP_URL}/auth/microsoft/callback"
     MICROSOFT_TENANT_ID=common

     GITHUB_CLIENT_ID=your_github_client_id
     GITHUB_CLIENT_SECRET=your_github_client_secret
     GITHUB_REDIRECT_URI="${APP_URL}/auth/github/callback"

     X_CLIENT_ID=your_x_client_id
     X_CLIENT_SECRET=your_x_client_secret
     X_REDIRECT_URI="${APP_URL}/auth/x/callback"

     DISCORD_CLIENT_ID=your_discord_client_id
     DISCORD_CLIENT_SECRET=your_discord_client_secret
     DISCORD_REDIRECT_URI="${APP_URL}/auth/discord/callback"
     ```

4. **Run Migrations**

   ```bash
   php artisan migrate
   ```

5. **Serve the App**

   ```bash
   php artisan serve
   ```
   *(In a separate terminal, also run `npm run dev` to compile assets).*

## Implementation Highlights

### 1. Social Authentication Routing

Dedicated routes are set up to handle the redirect to the OAuth provider and the callback from the provider. 

### 2. SocialAuthController

A dedicated `SocialAuthController` manages the authentication flow:
- Validates the requested provider.
- Retrieves user data from the provider.
- Registers a new user or logs in an existing user.
- Automatically links new social accounts to users based on their email addresses to prevent duplicate accounts.

## Project Structure Highlights

```
app/
├── Http/Controllers/Auth/SocialAuthController.php
├── Models/
│   ├── SocialAccount.php
│   └── User.php
resources/views/
├── auth/
│   ├── login.blade.php
│   └── register.blade.php
routes/
├── web.php
```

Use the provided social login buttons on the login or registration page to test the functionality locally.

---
