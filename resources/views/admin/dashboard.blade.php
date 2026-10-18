<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard | PLMun Campus Connect</title>

    <style>
        :root {
            --navy: #142746;
            --navy-light: #203b63;
            --cream: #f8f5ed;
            --gold: #d5ad52;
            --white: #ffffff;
            --text: #243047;
            --muted: #6d788b;
            --border: #e6e0d3;
            --shadow: 0 8px 24px rgba(20, 39, 70, 0.08);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--cream);
            color: var(--text);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .navbar {
            background: var(--navy);
            color: var(--white);
            padding: 15px 5%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand img {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
            background: white;
        }

        .brand h2 {
            font-size: 18px;
            color: var(--white);
        }

        .brand p {
            color: var(--gold);
            font-size: 12px;
            margin-top: 4px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 18px;
            flex-wrap: wrap;
        }

        .nav-links a {
            font-size: 14px;
            color: var(--white);
            transition: color 0.2s;
        }

        .nav-links a:hover {
            color: var(--gold);
        }

        .logout-form {
            display: inline;
        }

        .logout-btn {
            background: transparent;
            border: 1px solid var(--gold);
            color: var(--white);
            padding: 9px 14px;
            border-radius: 7px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: var(--gold);
            color: var(--navy);
        }

        .container {
            width: min(1200px, 90%);
            margin: 35px auto;
        }

        .welcome {
            background: var(--navy);
            color: var(--white);
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 28px;
            position: relative;
            overflow: hidden;
        }

        .welcome::after {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            right: -45px;
            top: -75px;
            border: 25px solid rgba(213, 173, 82, 0.16);
            border-radius: 50%;
        }

        .welcome .eyebrow {
            color: var(--gold);
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .welcome h1 {
            font-size: clamp(25px, 4vw, 36px);
            margin-bottom: 10px;
        }

        .welcome p {
            color: #e2e7ef;
            line-height: 1.6;
            max-width: 650px;
        }

        .section-title {
            font-size: 21px;
            color: var(--navy);
            margin-bottom: 18px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 13px;
            padding: 22px;
            box-shadow: var(--shadow);
            border-top: 4px solid var(--gold);
        }

        .stat-label {
            color: var(--muted);
            font-size: 13px;
            margin-bottom: 12px;
        }

        .stat-number {
            color: var(--navy);
            font-size: 34px;
            font-weight: bold;
        }

        .stat-description {
            color: var(--muted);
            font-size: 12px;
            margin-top: 8px;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1.6fr 1fr;
            gap: 22px;
            align-items: start;
        }

        .panel {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 13px;
            padding: 24px;
            box-shadow: var(--shadow);
            margin-bottom: 22px;
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 20px;
        }

        .panel-header h2 {
            color: var(--navy);
            font-size: 18px;
        }

        .small-link {
            color: #8a671a;
            font-size: 13px;
            font-weight: bold;
        }

        .small-link:hover {
            text-decoration: underline;
        }

        .organization {
            padding: 15px 0;
            border-bottom: 1px solid var(--border);
        }

        .organization:first-child {
            padding-top: 0;
        }

        .organization:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .organization h3 {
            color: var(--navy);
            font-size: 15px;
            margin-bottom: 6px;
        }

        .organization p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.5;
        }

        .empty-state {
            color: var(--muted);
            font-size: 14px;
            padding: 15px 0;
            line-height: 1.6;
        }

        .actions {
            display: grid;
            gap: 12px;
        }

        .action-link {
            display: block;
            background: var(--cream);
            border: 1px solid var(--border);
            padding: 16px;
            border-radius: 9px;
            transition: transform 0.2s, border-color 0.2s;
        }

        .action-link:hover {
            transform: translateY(-2px);
            border-color: var(--gold);
        }

        .action-link strong {
            display: block;
            color: var(--navy);
            font-size: 14px;
            margin-bottom: 6px;
        }

        .action-link span {
            color: var(--muted);
            font-size: 12px;
            line-height: 1.5;
        }

        .role-badge {
            display: inline-block;
            background: rgba(213, 173, 82, 0.18);
            color: #f0cf7a;
            border: 1px solid rgba(213, 173, 82, 0.45);
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            margin-top: 15px;
        }

        footer {
            text-align: center;
            padding: 25px 15px;
            color: var(--muted);
            font-size: 12px;
        }

        @media (max-width: 900px) {
            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 500px) {
            .navbar {
                align-items: flex-start;
            }

            .nav-links {
                gap: 12px;
            }

            .container {
                width: 92%;
                margin-top: 22px;
            }

            .welcome,
            .panel {
                padding: 20px;
            }

            .stats {
                gap: 10px;
            }

            .stat-card {
                padding: 16px;
            }

            .stat-number {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>

    <header class="navbar">

        <a href="{{ route('home') }}" class="brand">
            <img src="{{ asset('images/logo2.jpg') }}"
                 alt="PLMun logo">

            <div>
                <h2>PLMun Campus Connect</h2>
                <p>Administrator Portal</p>
            </div>
        </a>

        <nav class="nav-links">
            <a href="{{ route('home') }}">Home</a>

            <a href="{{ route('organizations.index') }}">
                Organizations
            </a>

            <a href="{{ route('admin.students.index') }}">
                Manage Students
            </a>

            <a href="{{ route('profile') }}">My Profile</a>

            <form action="{{ route('logout') }}"
                  method="POST"
                  class="logout-form">
                @csrf

                <button type="submit" class="logout-btn">
                    Logout
                </button>
            </form>
        </nav>

    </header>

    <main class="container">

        <section class="welcome">
            <div class="eyebrow">Administrator Dashboard</div>

            <h1>
                Welcome, {{ auth()->user()->name }}!
            </h1>

            <p>
                Manage campus organizations and monitor registered
                users through your PLMun Campus Connect administrator
                dashboard.
            </p>

            <span class="role-badge">ADMINISTRATOR</span>
        </section>

        <h2 class="section-title">Campus Overview</h2>

        <section class="stats">

            <article class="stat-card">
                <div class="stat-label">Total Organizations</div>
                <div class="stat-number">{{ $totalOrganizations }}</div>
                <div class="stat-description">
                    Organizations listed in the directory
                </div>
            </article>

            <article class="stat-card">
                <div class="stat-label">Registered Users</div>
                <div class="stat-number">{{ $totalUsers }}</div>
                <div class="stat-description">
                    All registered accounts
                </div>
            </article>

            <article class="stat-card">
                <div class="stat-label">Student Accounts</div>
                <div class="stat-number">{{ $totalStudents }}</div>
                <div class="stat-description">
                    Accounts with the student role
                </div>
            </article>

            <article class="stat-card">
                <div class="stat-label">Administrator Accounts</div>
                <div class="stat-number">{{ $totalAdmins }}</div>
                <div class="stat-description">
                    Accounts with administrator access
                </div>
            </article>

        </section>

        <section class="content-grid">

            <div class="panel">

                <div class="panel-header">
                    <h2>Recently Added Organizations</h2>

                    <a href="{{ route('organizations.index') }}"
                       class="small-link">
                        View all
                    </a>
                </div>

                @forelse ($recentOrganizations as $organization)

                    <article class="organization">

                        <h3>{{ $organization->name }}</h3>

                        @if (!empty($organization->description))
                            <p>
                                {{ Str::limit($organization->description, 140) }}
                            </p>
                        @else
                            <p>No description available.</p>
                        @endif

                    </article>

                @empty

                    <p class="empty-state">
                        No organizations have been added yet.
                        You can create your first organization using
                        the management link.
                    </p>

                @endforelse

            </div>

            <aside class="panel">

                <div class="panel-header">
                    <h2>Quick Actions</h2>
                </div>

                <div class="actions">

                    <a href="{{ route('organizations.index') }}"
                       class="action-link">
                        <strong>Manage Organizations</strong>
                        <span>
                            Browse the directory and access organization
                            editing and deletion controls.
                        </span>
                    </a>

                    <a href="{{ route('admin.students.index') }}"
                       class="action-link">
                        <strong>Manage Student Accounts</strong>
                        <span>
                            View registered students and search by name,
                            email, or student number. Review their college,
                            program, and year level.
                        </span>
                    </a>

                    <a href="{{ route('organizations.create') }}"
                       class="action-link">
                        <strong>Add an Organization</strong>
                        <span>
                            Register a new campus organization in the
                            directory.
                        </span>
                    </a>

                    <a href="{{ route('profile') }}"
                       class="action-link">
                        <strong>View My Profile</strong>
                        <span>
                            Review your administrator account details.
                        </span>
                    </a>

                    <a href="{{ route('home') }}"
                       class="action-link">
                        <strong>Visit Homepage</strong>
                        <span>
                            Return to the main Campus Connect page.
                        </span>
                    </a>

                </div>

            </aside>

        </section>

    </main>

    <footer>
        PLMun Campus Connect &copy; {{ date('Y') }}.
        Administrator Portal.
    </footer>

</body>
</html>
