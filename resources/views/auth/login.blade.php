<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | PLMun Campus Connect</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        body {
            background: #f8f7f3;
            color: #183153;
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .auth-card {
            background: #ffffff;
            width: 100%;
            max-width: 460px;
            padding: 36px;
            border: 1px solid #e8e1d6;
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(24, 49, 83, 0.06);
        }

        .university-logo {
            width: 62px;
            height: 62px;
            object-fit: contain;
            margin-bottom: 16px;
        }

        .brand {
            font-size: 23px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #777f8f;
            margin-bottom: 28px;
        }

        .form-label {
            font-weight: 600;
        }

        .form-control {
            padding: 12px;
            border-radius: 9px;
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper .form-control {
            padding-right: 48px;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #183153;
            cursor: pointer;
            padding: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .toggle-password:hover {
            color: #b68b36;
        }

        .toggle-password:focus-visible {
            outline: 2px solid #b68b36;
            outline-offset: 2px;
            border-radius: 4px;
        }

        .toggle-password svg {
            width: 20px;
            height: 20px;
        }

        .btn-primary {
            background: #183153;
            border-color: #183153;
            padding: 12px;
            font-weight: 600;
            border-radius: 9px;
        }

        .btn-primary:hover {
            background: #24466f;
            border-color: #24466f;
        }

        .auth-link {
            color: #183153;
            font-weight: 600;
            text-decoration: none;
        }

        .auth-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="auth-card">

    <!-- University Logo and Heading -->
    <div class="text-center">
        <a href="{{ route('home') }}">
            <img
                src="{{ asset('images/logo2.jpg') }}"
                alt="PLMun Logo"
                class="university-logo"
            >
        </a>

        <div class="brand">Welcome Back!</div>

        <p class="subtitle">
            Log in to PLMun Campus Connect.
        </p>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Login Form -->
    <form action="{{ route('login') }}" method="POST">
        @csrf

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">
                Email Address
            </label>

            <input
                type="email"
                id="email"
                name="email"
                class="form-control"
                value="{{ old('email') }}"
                placeholder="Enter your email"
                autocomplete="username"
                required
                autofocus
            >
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="form-label">
                Password
            </label>

            <div class="password-wrapper">
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control"
                    placeholder="Enter your password"
                    autocomplete="current-password"
                    required
                >

                <button
                    type="button"
                    class="toggle-password"
                    id="togglePassword"
                    aria-label="Show password"
                    aria-controls="password"
                    aria-pressed="false"
                >
                    <svg
                        id="eyeIcon"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Login Button -->
        <button type="submit" class="btn btn-primary w-100">
            Log In
        </button>
    </form>

    <!-- Register Link -->
    <p class="text-center mt-4 mb-0">
        Don't have an account?
        <a href="{{ route('register') }}" class="auth-link">
            Register
        </a>
    </p>

    <!-- Home Link -->
    <p class="text-center mt-3 mb-0">
        <a href="{{ route('home') }}" class="auth-link">
            &larr; Back to Home
        </a>
    </p>

</div>

<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    const eyeOpen = `
        <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"/>
        <circle cx="12" cy="12" r="3"/>
    `;

    const eyeClosed = `
        <path d="m3 3 18 18"/>
        <path d="M10.6 10.6a2 2 0 0 0 2.8 2.8"/>
        <path d="M9.9 5.2A10.8 10.8 0 0 1 12 5c6.4 0 10 7 10 7a14.8 14.8 0 0 1-3 3.8"/>
        <path d="M6.6 6.6C3.6 8.5 2 12 2 12s3.6 7 10 7a10.5 10.5 0 0 0 4-.8"/>
    `;

    togglePassword.addEventListener('click', function () {
        const isHidden = passwordInput.type === 'password';

        passwordInput.type = isHidden ? 'text' : 'password';

        eyeIcon.innerHTML = isHidden ? eyeClosed : eyeOpen;

        togglePassword.setAttribute(
            'aria-label',
            isHidden ? 'Hide password' : 'Show password'
        );

        togglePassword.setAttribute(
            'aria-pressed',
            String(isHidden)
        );
    });
</script>

</body>
</html>
