<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Profile | PLMun Campus Connect</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>
        :root {
            --navy: #172b4d;
            --navy-light: #263f68;
            --gold: #c9a04a;
            --cream: #faf9f6;
            --muted: #758096;
            --border: #e9e5dc;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--cream);
            color: var(--navy);
        }

        /* PAGE TRANSITION */
        #page-transition {
            position: fixed;
            inset: 0;
            z-index: 99999;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--navy);
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: opacity 0.25s ease,
                        visibility 0.25s ease;
        }

        #page-transition.active {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        .transition-spinner {
            width: 46px;
            height: 46px;
            border: 4px solid rgba(255, 255, 255, 0.25);
            border-top-color: var(--gold);
            border-radius: 50%;
            animation: campusConnectSpin 0.7s linear infinite;
        }

        @keyframes campusConnectSpin {
            to {
                transform: rotate(360deg);
            }
        }

        /* NAVIGATION */
        .navbar {
            background: #fff;
            border-bottom: 1px solid var(--border);
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: var(--navy);
            text-decoration: none;
            font-size: 18px;
            font-weight: 800;
        }

        .brand:hover {
            color: var(--navy-light);
        }

        .university-logo {
            width: 44px;
            height: 44px;
            object-fit: contain;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .nav-link {
            color: var(--navy);
            font-size: 14px;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        .nav-link:hover {
            color: #a67c2e;
        }

        .logout-button {
            background: transparent;
            border: 0;
            color: var(--navy);
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            padding: 8px;
            transition: color 0.2s ease;
        }

        .logout-button:hover {
            color: #b42318;
        }

        /* PAGE HEADING */
        .page-heading {
            padding: 48px 0 25px;
            animation: fadeUp 0.5s ease both;
        }

        .eyebrow {
            color: #a67c2e;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .page-heading h1 {
            margin-top: 12px;
            font-size: clamp(30px, 5vw, 42px);
            font-weight: 800;
            letter-spacing: -1.2px;
        }

        .page-heading p {
            color: var(--muted);
            line-height: 1.8;
        }

        /* PROFILE CARD */
        .profile-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: clamp(22px, 4vw, 36px);
            margin-bottom: 30px;
            box-shadow: 0 6px 22px rgba(23, 43, 77, 0.05);
            animation: fadeUp 0.6s ease 0.1s both;
        }

        .profile-card-header {
            display: flex;
            align-items: center;
            gap: 16px;
            padding-bottom: 25px;
            margin-bottom: 25px;
            border-bottom: 1px solid var(--border);
        }

        .profile-avatar {
            width: 64px;
            height: 64px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 18px;
            background: var(--navy);
            color: #fff;
            border: 2px solid var(--gold);
            font-size: 25px;
            font-weight: 800;
        }

        .profile-card-header h2 {
            margin: 0 0 5px;
            font-size: 21px;
            font-weight: 800;
            overflow-wrap: anywhere;
        }

        .profile-card-header p {
            margin: 0;
            color: var(--muted);
            font-size: 13px;
        }

        /* PROFILE INFORMATION */
        .profile-field {
            height: 100%;
            padding: 17px;
            background: #fcfbf8;
            border: 1px solid #f0ede6;
            border-radius: 12px;
            transition:
                border-color 0.2s ease,
                background 0.2s ease,
                transform 0.2s ease;
        }

        .profile-field:hover {
            background: #fffdf8;
            border-color: #e5d6b5;
            transform: translateY(-2px);
        }

        .field-label {
            display: block;
            margin-bottom: 8px;
            color: var(--muted);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .field-value {
            color: var(--navy);
            font-size: 15px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        /* BUTTONS */
        .btn-primary-custom {
            display: inline-block;
            background: var(--navy);
            color: #fff;
            border: 1px solid var(--navy);
            border-radius: 10px;
            padding: 12px 18px;
            text-decoration: none;
            font-weight: 700;
            transition:
                background 0.2s ease,
                box-shadow 0.2s ease,
                transform 0.2s ease;
        }

        .btn-primary-custom:hover {
            background: var(--navy-light);
            color: #fff;
            box-shadow: 0 7px 16px rgba(23, 43, 77, 0.15);
            transform: translateY(-2px);
        }

        .btn-secondary-custom {
            display: inline-block;
            background: #fff;
            color: var(--navy);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 12px 18px;
            text-decoration: none;
            font-weight: 700;
            transition:
                background 0.2s ease,
                border-color 0.2s ease,
                transform 0.2s ease;
        }

        .btn-secondary-custom:hover {
            background: #f4f2ed;
            border-color: #d8cfbd;
            color: var(--navy);
            transform: translateY(-2px);
        }

        .btn-primary-custom:active,
        .btn-secondary-custom:active {
            transform: scale(0.98);
        }

        /* FOOTER */
        footer {
            margin-top: 40px;
            padding: 25px 0;
            background: #fff;
            border-top: 1px solid var(--border);
            color: var(--muted);
            font-size: 12px;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(14px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        a:focus-visible,
        button:focus-visible {
            outline: 3px solid rgba(201, 160, 74, 0.75);
            outline-offset: 3px;
        }

        @media (max-width: 576px) {
            .brand {
                font-size: 15px;
            }

            .university-logo {
                width: 38px;
                height: 38px;
            }

            .page-heading {
                padding-top: 35px;
            }

            .profile-card-header {
                align-items: flex-start;
            }

            .profile-avatar {
                width: 52px;
                height: 52px;
                border-radius: 14px;
                font-size: 21px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>

<body>

<!-- PAGE TRANSITION OVERLAY -->
<div id="page-transition" aria-hidden="true">
    <div class="transition-spinner"></div>
</div>

<!-- NAVIGATION -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container py-2">

        <a href="/" class="brand">
            <img
                src="{{ asset('images/logo2.jpg') }}"
                alt="PLMun University Seal"
                class="university-logo"
            >
            <span>PLMun Campus Connect</span>
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNav"
            aria-controls="mainNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <div class="navbar-nav ms-auto align-items-lg-center gap-lg-3">

                <a class="nav-link" href="/">Home</a>

                <a class="nav-link"
                   href="{{ route('organizations.index') }}">
                    Organizations
                </a>

                <a class="nav-link"
                   href="{{ route('profile') }}">
                    My Profile
                </a>

                <form action="{{ route('logout') }}"
                      method="POST"
                      class="d-inline">
                    @csrf

                    <button type="submit" class="logout-button">
                        Logout
                    </button>
                </form>

            </div>
        </div>

    </div>
</nav>

<main class="container pb-4">

    <!-- PAGE INTRODUCTION -->
    <header class="page-heading">
        <span class="eyebrow">Your campus account</span>

        <h1>My Profile</h1>

        <p>
            View your student information and account details.
        </p>
    </header>

    <!-- PROFILE INFORMATION -->
    <section class="profile-card">

        <div class="profile-card-header">

            <div class="profile-avatar" aria-hidden="true">
                {{ strtoupper(substr($user->name ?? 'S', 0, 1)) }}
            </div>

            <div>
                <h2>{{ $user->name }}</h2>

                <p>
                    PLMun Campus Connect student account
                </p>
            </div>

        </div>

        <div class="row g-3">

            <!-- FULL NAME -->
            <div class="col-md-6">
                <div class="profile-field">
                    <span class="field-label">Full Name</span>

                    <div class="field-value">
                        {{ $user->name ?: 'Not provided' }}
                    </div>
                </div>
            </div>

            <!-- STUDENT NUMBER -->
            <div class="col-md-6">
                <div class="profile-field">
                    <span class="field-label">Student Number</span>

                    <div class="field-value">
                        {{ $user->student_number ?: 'Not provided' }}
                    </div>
                </div>
            </div>

            <!-- EMAIL -->
            <div class="col-md-6">
                <div class="profile-field">
                    <span class="field-label">Email Address</span>

                    <div class="field-value">
                        {{ $user->email ?: 'Not provided' }}
                    </div>
                </div>
            </div>

            <!-- COLLEGE -->
            <div class="col-md-6">
                <div class="profile-field">
                    <span class="field-label">College</span>

                    <div class="field-value">
                        {{ $user->college ?: 'Not provided' }}
                    </div>
                </div>
            </div>

            <!-- PROGRAM -->
            <div class="col-md-6">
                <div class="profile-field">
                    <span class="field-label">Program</span>

                    <div class="field-value">
                        {{ $user->program ?: 'Not provided' }}
                    </div>
                </div>
            </div>

            <!-- YEAR LEVEL -->
            <div class="col-md-6">
                <div class="profile-field">
                    <span class="field-label">Year Level</span>

                    <div class="field-value">
                        {{ $user->year_level ?: 'Not provided' }}
                    </div>
                </div>
            </div>

        </div>

        <!-- PROFILE ACTIONS -->
        <div class="d-flex flex-wrap gap-3 mt-4">

            <a href="{{ route('organizations.index') }}"
               class="btn-primary-custom">
                Browse Organizations
            </a>

            <a href="/"
               class="btn-secondary-custom">
                Back to Home
            </a>

        </div>

    </section>

</main>

<!-- FOOTER -->
<footer>
    <div class="container d-flex flex-column flex-md-row
                justify-content-between gap-2">
        <span>PLMun Campus Connect</span>
        <span>Connecting students, organizations, and campus life.</span>
    </div>
</footer>

<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- PAGE TRANSITIONS -->
<script src="{{ asset('js/page-transitions.js') }}"></script>

</body>
</html>
