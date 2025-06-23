<x-guest-layout>
    <style>
        :root {
            --color-primary: #0a94d8;
            --color-primary-light: #31b0fc;
            --color-bg: #041d33;
            --color-bg-gradient-start: #041d33;
            --color-bg-gradient-end: #043a63;
            --color-accent: #10c3ff;
            --color-card-bg: rgba(255, 255, 255, 0.1);
            --color-text-primary: #e0f7ff;
            --color-text-secondary: #a8cfe9;
        }

        body {
            background: linear-gradient(135deg, var(--color-bg-gradient-start) 0%, var(--color-bg-gradient-end) 100%);
            min-height: 100vh;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        .login-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(16, 195, 255, 0.1) 0%, transparent 50%);
            animation: float 20s ease-in-out infinite;
            z-index: 0;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .login-card {
            background: var(--color-card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 2.5rem 4rem;
            width: 100%;
            max-width: 800px;
            box-shadow:
                0 20px 25px -5px rgba(0, 0, 0, 0.3),
                0 10px 10px -5px rgba(0, 0, 0, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 1;
        }

        .login-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .login-header h1 {
            color: #043a63;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .login-header p {
            color: #043a63;
            font-size: 0.95rem;
            opacity: 0.8;
        }

        .form-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            align-items: start;
        }

        .form-left {
            display: flex;
            flex-direction: column;
        }

        .form-right {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-label {
            display: block;
            color: #043a63;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .form-input {
            width: 100%;
            padding: 0.875rem 1rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            color: #043a63;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--color-primary-light);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 0 3px rgba(49, 176, 252, 0.2);
        }

        .form-input::placeholder {
            color: #043a63;
            opacity: 0.6;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
        }

        .checkbox-input {
            width: 1.125rem;
            height: 1.125rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            accent-color: var(--color-primary);
        }

        .checkbox-input:checked {
            background: var(--color-primary);
            border-color: var(--color-primary);
        }

        .checkbox-label {
            margin-left: 0.75rem;
            color: #043a63;
            font-size: 0.875rem;
            cursor: pointer;
            user-select: none;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-actions-wide {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
            grid-column: 1 / -1;
        }

        .forgot-password-link {
            color: #043a63;
            font-size: 0.875rem;
            text-decoration: none;
            transition: color 0.3s ease;
            border-radius: 6px;
            padding: 0.25rem;
        }

        .forgot-password-link:hover {
            color: var(--color-accent);
        }

        .login-button {
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-light) 100%);
            color: white;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 0.875rem 2rem;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(10, 148, 216, 0.3);
            position: relative;
            overflow: hidden;
        }

        .login-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(10, 148, 216, 0.4);
        }

        .login-button:hover::before {
            left: 100%;
        }

        .login-button:active {
            transform: translateY(0);
        }

        .error-message {
            color: #ff6b6b;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            padding: 0.5rem;
            background: rgba(255, 107, 107, 0.1);
            border-radius: 8px;
            border: 1px solid rgba(255, 107, 107, 0.2);
        }

        .success-message {
            color: #51cf66;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            padding: 0.75rem;
            background: rgba(81, 207, 102, 0.1);
            border-radius: 12px;
            border: 1px solid rgba(81, 207, 102, 0.2);
            text-align: center;
        }

        @media (max-width: 768px) {
            .login-card {
                padding: 2rem;
                margin: 1rem;
                max-width: 400px;
            }

            .form-content {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .form-actions-wide {
                flex-direction: column;
                align-items: stretch;
            }

            .login-button {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h1>Welcome Back</h1>
                <p>Sign in to your account to continue</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="success-message">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <input
                        id="email"
                        class="form-input"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="Enter your email address"
                    />
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input
                        id="password"
                        class="form-input"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Enter your password"
                    />
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="checkbox-container">
                    <input
                        id="remember_me"
                        type="checkbox"
                        class="checkbox-input"
                        name="remember"
                    >
                    <label for="remember_me" class="checkbox-label">
                        {{ __('Remember me for 30 days') }}
                    </label>
                </div>

                <div class="form-actions">
                    @if (Route::has('password.request'))
                        <a class="forgot-password-link" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <button type="submit" class="login-button">
                        {{ __('Sign In') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
