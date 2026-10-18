<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Registration | PLMun Campus Connect</title>

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
            padding: 30px 16px;
        }

        .auth-card {
            background: #ffffff;
            width: 100%;
            max-width: 560px;
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
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #777f8f;
            margin-bottom: 25px;
        }

        .section-heading {
            font-size: 15px;
            font-weight: 700;
            border-bottom: 1px solid #e8e1d6;
            padding-bottom: 10px;
            margin: 24px 0 18px;
        }

        .form-label {
            font-weight: 600;
            font-size: 14px;
        }

        .form-control,
        .form-select {
            padding: 12px;
            border-radius: 9px;
            border-color: #dcdfe5;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #183153;
            box-shadow: 0 0 0 0.2rem rgba(24, 49, 83, 0.12);
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

        .toggle-password svg {
            width: 20px;
            height: 20px;
        }

        .btn-primary {
            background: #183153;
            border-color: #183153;
            padding: 13px;
            font-weight: 700;
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

        .helper-text {
            color: #777f8f;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>

<body>

<div class="auth-card">

    <!-- PLMun Logo -->
    <div class="text-center">
        <a href="{{ route('home') }}">
            <img
                src="{{ asset('images/logo2.jpg') }}"
                alt="PLMun Logo"
                class="university-logo"
            >
        </a>

        <div class="brand">Student Registration</div>

        <p class="subtitle">
            Join the PLMun Campus Connect community.
        </p>
    </div>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Please check the following:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <!-- Personal Information -->
        <h2 class="section-heading">Personal Information</h2>

        <div class="mb-3">
            <label for="name" class="form-label">Full Name *</label>

            <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                value="{{ old('name') }}"
                placeholder="Enter your full name"
                autocomplete="name"
                maxlength="255"
                required
            >
        </div>

        <div class="mb-3">
            <label for="student_number" class="form-label">
                Student Number
            </label>

            <input
                type="text"
                id="student_number"
                name="student_number"
                class="form-control"
                value="{{ old('student_number') }}"
                placeholder="Enter your student number"
                maxlength="50"
            >

            <div class="helper-text">
                Optional. If entered, the student number must be unique.
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address *</label>

            <input
                type="email"
                id="email"
                name="email"
                class="form-control"
                value="{{ old('email') }}"
                placeholder="Enter your email address"
                autocomplete="email"
                maxlength="255"
                required
            >
        </div>

        <!-- Academic Information -->
        <h2 class="section-heading">Academic Information</h2>

        <div class="mb-3">
            <label for="college" class="form-label">
                College / Department *
            </label>

            <select
                id="college"
                name="college"
                class="form-select"
                required
            >
                <option value="">Select your college or department</option>

                <option value="College of Information Technology and Computer Studies"
                    {{ old('college') == 'College of Information Technology and Computer Studies' ? 'selected' : '' }}>
                    College of Information Technology and Computer Studies
                </option>

                <option value="College of Arts and Sciences"
                    {{ old('college') == 'College of Arts and Sciences' ? 'selected' : '' }}>
                    College of Arts and Sciences
                </option>

                <option value="College of Business Administration"
                    {{ old('college') == 'College of Business Administration' ? 'selected' : '' }}>
                    College of Business Administration
                </option>

                <option value="College of Education"
                    {{ old('college') == 'College of Education' ? 'selected' : '' }}>
                    College of Education
                </option>

                <option value="Other"
                    {{ old('college') == 'Other' ? 'selected' : '' }}>
                    Other / Not Listed
                </option>
            </select>

            <div class="helper-text">
                Choose your college or department. If yours is not listed,
                select Other / Not Listed.
            </div>
        </div>

        <div class="mb-3">
            <label for="program" class="form-label">
                Program / Course *
            </label>

            <select
                id="program"
                name="program"
                class="form-select"
                required
            >
                <option value="">Select your program or course</option>

                <option value="Associate in Computer Technology (ACT)"
                    {{ old('program') == 'Associate in Computer Technology (ACT)' ? 'selected' : '' }}>
                    Associate in Computer Technology (ACT)
                </option>

                <option value="BS Information Technology (BSIT)"
                    {{ old('program') == 'BS Information Technology (BSIT)' ? 'selected' : '' }}>
                    BS Information Technology (BSIT)
                </option>

                <option value="BS Computer Science (BSCS)"
                    {{ old('program') == 'BS Computer Science (BSCS)' ? 'selected' : '' }}>
                    BS Computer Science (BSCS)
                </option>

                <option value="BS Business Administration (BSBA)"
                    {{ old('program') == 'BS Business Administration (BSBA)' ? 'selected' : '' }}>
                    BS Business Administration (BSBA)
                </option>

                <option value="BS Psychology"
                    {{ old('program') == 'BS Psychology' ? 'selected' : '' }}>
                    BS Psychology
                </option>

                <option value="Bachelor of Elementary Education"
                    {{ old('program') == 'Bachelor of Elementary Education' ? 'selected' : '' }}>
                    Bachelor of Elementary Education
                </option>

                <option value="Bachelor of Secondary Education"
                    {{ old('program') == 'Bachelor of Secondary Education' ? 'selected' : '' }}>
                    Bachelor of Secondary Education
                </option>

                <option value="Other"
                    {{ old('program') == 'Other' ? 'selected' : '' }}>
                    Other / Not Listed
                </option>
            </select>

            <div class="helper-text">
                Choose your actual program or course.
            </div>
        </div>

        <div class="mb-3">
            <label for="year_level" class="form-label">Year Level *</label>

            <select
                id="year_level"
                name="year_level"
                class="form-select"
                required
            >
                <option value="">Select your year level</option>

                @foreach (['1st Year', '2nd Year', '3rd Year', '4th Year', '5th Year'] as $year)
                    <option
                        value="{{ $year }}"
                        {{ old('year_level') == $year ? 'selected' : '' }}
                    >
                        {{ $year }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Account Security -->
        <h2 class="section-heading">Account Security</h2>

        <div class="mb-3">
            <label for="password" class="form-label">Password *</label>

            <div class="password-wrapper">
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control"
                    placeholder="At least 8 characters"
                    autocomplete="new-password"
                    required
                >

                <button
                    type="button"
                    class="toggle-password"
                    data-target="password"
                    aria-label="Show password"
                    aria-controls="password"
                    aria-pressed="false"
                >
                    <svg
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

        <div class="mb-4">
            <label for="password_confirmation" class="form-label">
                Confirm Password *
            </label>

            <div class="password-wrapper">
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    class="form-control"
                    placeholder="Enter your password again"
                    autocomplete="new-password"
                    required
                >

                <button
                    type="button"
                    class="toggle-password"
                    data-target="password_confirmation"
                    aria-label="Show confirm password"
                    aria-controls="password_confirmation"
                    aria-pressed="false"
                >
                    <svg
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

        <button type="submit" class="btn btn-primary w-100">
            Create Student Account
        </button>
    </form>

    <p class="text-center mt-4 mb-0">
        Already have an account?
        <a href="{{ route('login') }}" class="auth-link">Log in</a>
    </p>

    <p class="text-center mt-3 mb-0">
        <a href="{{ route('home') }}" class="auth-link">
            &larr; Back to Home
        </a>
    </p>

</div>

<script>
    document.querySelectorAll('.toggle-password').forEach(function (button) {
        button.addEventListener('click', function () {
            const input = document.getElementById(this.dataset.target);
            const isHidden = input.type === 'password';

            input.type = isHidden ? 'text' : 'password';

            this.innerHTML = isHidden
                ? `
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <path d="m3 3 18 18"/>
                        <path d="M10.6 10.6a2 2 0 0 0 2.8 2.8"/>
                        <path d="M9.9 5.2A10.8 10.8 0 0 1 12 5c6.4 0 10 7 10 7a14.8 14.8 0 0 1-3 3.8"/>
                        <path d="M6.6 6.6C3.6 8.5 2 12 2 12s3.6 7 10 7a10.5 10.5 0 0 0 4-.8"/>
                    </svg>
                `
                : `
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                `;

            this.setAttribute(
                'aria-label',
                isHidden ? 'Hide password' : 'Show password'
            );

            this.setAttribute('aria-pressed', String(isHidden));
        });
    });
</script>

</body>
</html>
