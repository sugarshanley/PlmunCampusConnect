<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PLMun Campus Connect</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>
        :root {
            --navy: #172b4d;
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
            background: var(--cream);
            color: var(--navy);
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* NAVIGATION */
        .navbar {
            background: var(--navy);
            padding: 14px 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            text-decoration: none;
            font-size: 16px;
            font-weight: 800;
        }

        .brand:hover {
            color: white;
        }

        .brand img {
            width: 44px;
            height: 44px;
            object-fit: contain;
            border-radius: 50%;
            background: white;
        }

        .brand small {
            display: block;
            color: var(--gold);
            font-size: 11px;
            font-weight: 500;
        }

        .navbar .nav-link {
            color: white;
            font-size: 13px;
            font-weight: 600;
            padding: 9px 10px;
        }

        .navbar .nav-link:hover {
            color: var(--gold);
        }

        .navbar-toggler {
            border-color: rgba(255,255,255,.5);
        }

        .navbar-toggler-icon {
            filter: invert(1);
        }

        .logout-button {
            padding: 7px 13px;
            border: 1px solid var(--gold);
            border-radius: 8px;
            background: transparent;
            color: white;
            font-size: 13px;
            font-weight: 700;
        }

        .logout-button:hover {
            background: var(--gold);
            color: var(--navy);
        }

        /* MAIN CONTENT */
        .main-container {
            max-width: 1100px;
            margin: auto;
            padding: 38px 20px 55px;
        }

        /* HERO */
        .hero {
            position: relative;
            overflow: hidden;
            padding: 45px;
            border-radius: 18px;
            background: var(--navy);
            color: white;
        }

        .hero::after {
            content: "";
            position: absolute;
            top: -55px;
            right: -35px;
            width: 210px;
            height: 210px;
            border: 22px solid rgba(201,160,74,.16);
            border-radius: 50%;
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 720px;
        }

        .hero-eyebrow {
            color: var(--gold);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .hero h1 {
            margin: 15px 0;
            font-size: clamp(30px, 5vw, 42px);
            font-weight: 800;
            line-height: 1.25;
        }

        .hero p {
            max-width: 650px;
            color: #e2e7f0;
            font-size: 14px;
            line-height: 1.8;
        }

        .btn-gold {
            display: inline-block;
            padding: 12px 17px;
            border: 1px solid var(--gold);
            border-radius: 8px;
            background: var(--gold);
            color: var(--navy);
            font-size: 13px;
            font-weight: 800;
            text-decoration: none;
        }

        .btn-gold:hover {
            background: #e0ba65;
            color: var(--navy);
        }

        .btn-outline-light-custom {
            display: inline-block;
            padding: 12px 17px;
            border: 1px solid #8d9bb0;
            border-radius: 8px;
            background: transparent;
            color: white;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
        }

        .btn-outline-light-custom:hover {
            background: white;
            color: var(--navy);
        }

        /* SECTION HEADINGS */
        .section-heading {
            margin: 32px 0 20px;
        }

        .section-heading h2 {
            font-size: 22px;
            font-weight: 800;
        }

        .section-heading p {
            margin-bottom: 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
        }

        /* FEATURE CARDS */
        .feature-card {
            height: 100%;
            padding: 22px;
            border: 1px solid var(--border);
            border-top: 4px solid var(--gold);
            border-radius: 12px;
            background: white;
            transition: transform .2s, box-shadow .2s;
        }

        .feature-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(23,43,77,.07);
        }

        .feature-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            margin-bottom: 16px;
            border-radius: 10px;
            background: #f3ead6;
            color: var(--navy);
            font-size: 20px;
        }

        .feature-card h3 {
            margin-bottom: 10px;
            font-size: 15px;
            font-weight: 800;
        }

        .feature-card p {
            margin-bottom: 16px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.8;
        }

        .feature-link {
            color: var(--navy);
            font-size: 13px;
            font-weight: 800;
            text-decoration: none;
        }

        .feature-link:hover {
            color: #a67c2e;
        }

        /* INFORMATION BANNER */
        .info-banner {
            margin-top: 32px;
            padding: 25px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: #efe7d6;
        }

        .info-banner h2 {
            font-size: 20px;
            font-weight: 800;
        }

        .info-banner p {
            margin-bottom: 0;
            color: #59677e;
            font-size: 13px;
            line-height: 1.8;
        }

        /* FOOTER */
        footer {
            padding: 25px 0;
            border-top: 1px solid var(--border);
            background: white;
            color: var(--muted);
            font-size: 12px;
        }

        @media (max-width: 576px) {
            .hero {
                padding: 28px 23px;
            }

            .main-container {
                padding: 25px 16px 40px;
            }

            .brand {
                font-size: 14px;
            }

            .brand img {
                width: 38px;
                height: 38px;
            }

            .navbar .nav-link {
                padding: 10px 0;
            }
        }
    </style>
</head>

<body>

<!-- NAVIGATION -->
<nav class="navbar navbar-expand-lg">
    <div class="container">

        <a href="{{ route('home') }}" class="brand">
            <img src="{{ asset('images/logo2.jpg') }}"
                 alt="PLMun University Seal">

            <span>
                PLMun Campus Connect
                <small>Find Your Campus Community</small>
            </span>
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavigation"
                aria-controls="mainNavigation"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavigation">
            <div class="navbar-nav ms-auto align-items-lg-center gap-lg-1">

                <a class="nav-link" href="{{ route('home') }}">
                    Home
                </a>

                <a class="nav-link" href="{{ route('organizations.index') }}">
                    Organizations
                </a>

                <!-- EVENTS LINK -->
                <a class="nav-link" href="{{ route('events.index') }}">
                    Events
                </a>

                @auth

                    @if (auth()->user()->isAdmin())
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            Admin Dashboard
                        </a>
                    @endif

                    <a class="nav-link" href="{{ route('profile') }}">
                        My Profile
                    </a>

                    <form action="{{ route('logout') }}"
                          method="POST"
                          class="ms-lg-2">
                        @csrf

                        <button type="submit" class="logout-button">
                            Logout
                        </button>
                    </form>

                @else

                    <a class="nav-link" href="{{ route('login') }}">
                        Login
                    </a>

                    <a class="nav-link" href="{{ route('register') }}">
                        Register
                    </a>

                @endauth

            </div>
        </div>
    </div>
</nav>

<main class="main-container">

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-content">

            <span class="hero-eyebrow">
                Pamantasan ng Lungsod ng Muntinlupa
            </span>

            <h1>
                Your Campus Life. Your Community. Your Connection.
            </h1>

            <p>
                Discover student organizations, connect with campus communities,
                and explore opportunities to participate in university life
                through PLMun Campus Connect.
            </p>

            <div class="d-flex flex-wrap gap-3 mt-4">

                <a href="{{ route('organizations.index') }}"
                   class="btn-gold">
                    Explore Organizations
                </a>

                <a href="{{ route('events.index') }}"
                   class="btn-outline-light-custom">
                    Explore Events
                </a>

                @auth
                    @if (auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}"
                           class="btn-outline-light-custom">
                            Open Admin Dashboard
                        </a>
                    @endif
                @endauth

            </div>
        </div>
    </section>

    <!-- EXPLORE SECTION -->
    <section id="explore">

        <div class="section-heading">
            <h2>Explore Campus Connect</h2>
            <p>
                Find ways to discover and engage with the PLMun student community.
            </p>
        </div>

        <div class="row g-3">

            <!-- ORGANIZATIONS -->
            <div class="col-md-6 col-lg-4">
                <article class="feature-card">

                    <div class="feature-icon">⌕</div>

                    <h3>Discover Organizations</h3>

                    <p>
                        Browse the organization directory and learn about
                        the campus groups available to students.
                    </p>

                    <a href="{{ route('organizations.index') }}"
                       class="feature-link">
                        View Organizations →
                    </a>

                </article>
            </div>

            <!-- EVENTS -->
            <div class="col-md-6 col-lg-4">
                <article class="feature-card">

                    <div class="feature-icon">◷</div>

                    <h3>Discover Campus Events</h3>

                    <p>
                        Find workshops, seminars, student activities, and
                        other campus events in one place.
                    </p>

                    <a href="{{ route('events.index') }}"
                       class="feature-link">
                        Browse Events →
                    </a>

                </article>
            </div>

            <!-- ACCOUNT -->
            <div class="col-md-6 col-lg-4">
                <article class="feature-card">

                    <div class="feature-icon">✦</div>

                    <h3>Manage Your Account</h3>

                    <p>
                        Access your account profile and manage your
                        personal information after signing in.
                    </p>

                    @auth
                        <a href="{{ route('profile') }}"
                           class="feature-link">
                            View My Profile →
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="feature-link">
                            Sign In →
                        </a>
                    @endauth

                </article>
            </div>

        </div>
    </section>

    <!-- CAMPUS COMMUNITY BANNER -->
    <section class="info-banner">
        <div class="row align-items-center g-3">

            <div class="col-lg-8">
                <h2>Be Part of Campus Life</h2>

                <p>
                    Explore student organizations and campus activities.
                    Stay connected with opportunities to learn, participate,
                    and build your university community.
                </p>
            </div>

            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('events.index') }}" class="btn-gold">
                    Find an Event
                </a>
            </div>

        </div>
    </section>

</main>

<!-- FOOTER -->
<footer>
    <div class="container d-flex flex-column flex-md-row
                justify-content-between align-items-md-center gap-2">

        <span>PLMun Campus Connect</span>

        <span>
            Connecting students, organizations, and campus life.
        </span>

    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
