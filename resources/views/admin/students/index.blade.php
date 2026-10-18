<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Students | PLMun Campus Connect</title>

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
            color: var(--white);
            font-size: 14px;
        }

        .nav-links a:hover {
            color: var(--gold);
        }

        .logout-form {
            display: inline;
        }

        .logout-btn {
            background: transparent;
            color: var(--white);
            border: 1px solid var(--gold);
            border-radius: 7px;
            padding: 9px 14px;
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

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .eyebrow {
            color: #98721e;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .page-header h1 {
            color: var(--navy);
            font-size: clamp(26px, 4vw, 34px);
            margin-bottom: 7px;
        }

        .page-header p {
            color: var(--muted);
            font-size: 14px;
        }

        .back-link {
            display: inline-block;
            background: var(--navy);
            color: var(--white);
            border-radius: 8px;
            padding: 11px 16px;
            font-size: 13px;
            font-weight: bold;
        }

        .back-link:hover {
            background: var(--navy-light);
        }

        .summary-card {
            background: var(--navy);
            color: var(--white);
            border-radius: 13px;
            padding: 24px;
            margin-bottom: 24px;
            border-left: 5px solid var(--gold);
        }

        .summary-card p {
            color: #dbe2ec;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .summary-card h2 {
            color: var(--gold);
            font-size: 32px;
        }

        .panel {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 13px;
            padding: 25px;
            box-shadow: 0 8px 24px rgba(20, 39, 70, 0.06);
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .panel-header h2 {
            color: var(--navy);
            font-size: 19px;
        }

        .panel-header span {
            color: var(--muted);
            font-size: 13px;
        }

        .search-form {
            display: flex;
            gap: 10px;
            margin-bottom: 24px;
        }

        .search-input {
            flex: 1;
            min-width: 0;
            padding: 12px 14px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 14px;
            outline: none;
        }

        .search-input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(213, 173, 82, 0.15);
        }

        .search-btn {
            border: none;
            border-radius: 8px;
            background: var(--navy);
            color: var(--white);
            padding: 12px 20px;
            font-weight: bold;
            cursor: pointer;
        }

        .search-btn:hover {
            background: var(--navy-light);
        }

        .clear-link {
            display: inline-flex;
            align-items: center;
            color: #8a671a;
            font-size: 13px;
            padding: 0 5px;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        thead {
            background: var(--navy);
            color: var(--white);
        }

        th {
            padding: 14px 13px;
            font-size: 12px;
            white-space: nowrap;
        }

        td {
            padding: 16px 13px;
            border-bottom: 1px solid var(--border);
            font-size: 13px;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #fcfaf5;
        }

        .student-name {
            color: var(--navy);
            font-weight: bold;
            margin-bottom: 4px;
        }

        .student-email {
            color: var(--muted);
            font-size: 12px;
            overflow-wrap: anywhere;
        }

        .student-number {
            font-weight: bold;
            color: var(--navy-light);
            white-space: nowrap;
        }

        .program {
            min-width: 120px;
        }

        .year-badge {
            display: inline-block;
            background: #f2ead7;
            color: #785a16;
            border-radius: 20px;
            padding: 5px 9px;
            font-size: 11px;
            font-weight: bold;
            white-space: nowrap;
        }

        .empty-state {
            text-align: center;
            padding: 40px 15px;
        }

        .empty-state h3 {
            color: var(--navy);
            font-size: 18px;
            margin-bottom: 8px;
        }

        .empty-state p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
        }

        .pagination-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 22px;
        }

        .pagination-info {
            color: var(--muted);
            font-size: 13px;
        }

        .pagination-links {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .pagination-links a,
        .pagination-links span {
            display: inline-block;
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 8px 11px;
            font-size: 12px;
        }

        .pagination-links a {
            background: var(--white);
            color: var(--navy);
        }

        .pagination-links a:hover {
            border-color: var(--gold);
        }

        .pagination-links span[aria-current="page"] {
            background: var(--navy);
            color: var(--white);
            border-color: var(--navy);
        }

        .pagination-links span[aria-disabled="true"] {
            color: #a4a9b1;
        }

        footer {
            text-align: center;
            color: var(--muted);
            font-size: 12px;
            padding: 25px 15px;
        }

        @media (max-width: 650px) {
            .navbar {
                align-items: flex-start;
            }

            .nav-links {
                gap: 12px;
            }

            .container {
                width: 94%;
                margin-top: 25px;
            }

            .panel {
                padding: 16px;
            }

            .search-form {
                flex-wrap: wrap;
            }

            .search-input {
                flex-basis: 100%;
            }

            .search-btn {
                flex: 1;
            }

            .pagination-wrapper {
                align-items: flex-start;
                flex-direction: column;
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
                <p>Student Account Management</p>
            </div>
        </a>

        <nav class="nav-links">
            <a href="{{ route('home') }}">Home</a>

            <a href="{{ route('admin.dashboard') }}">
                Admin Dashboard
            </a>

            <a href="{{ route('organizations.index') }}">
                Organizations
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

        <section class="page-header">
            <div>
                <div class="eyebrow">Administration</div>

                <h1>Manage Student Accounts</h1>

                <p>
                    View and search registered student accounts
                    in PLMun Campus Connect.
                </p>
            </div>

            <a href="{{ route('admin.dashboard') }}"
               class="back-link">
                Back to Dashboard
            </a>
        </section>

        <section class="summary-card">
            <p>Total registered student accounts</p>
            <h2>{{ number_format($totalStudents) }}</h2>
        </section>

        <section class="panel">

            <div class="panel-header">
                <h2>Student Directory</h2>

                <span>
                    {{ $students->total() }}
                    {{ $students->total() === 1 ? 'result' : 'results' }}
                </span>
            </div>

            <form action="{{ route('admin.students.index') }}"
                  method="GET"
                  class="search-form">

                <input
                    type="search"
                    name="search"
                    class="search-input"
                    value="{{ $search }}"
                    placeholder="Search name, email, or student number..."
                    aria-label="Search student accounts"
                >

                <button type="submit" class="search-btn">
                    Search
                </button>

                @if ($search !== '')
                    <a href="{{ route('admin.students.index') }}"
                       class="clear-link">
                        Clear
                    </a>
                @endif

            </form>

            <div class="table-wrapper">

                <table>
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Student Number</th>
                            <th>College</th>
                            <th>Program</th>
                            <th>Year Level</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($students as $student)
                            <tr>
                                <td>
                                    <div class="student-name">
                                        {{ $student->name }}
                                    </div>

                                    <div class="student-email">
                                        {{ $student->email }}
                                    </div>
                                </td>

                                <td>
                                    <span class="student-number">
                                        {{ $student->student_number ?: 'Not provided' }}
                                    </span>
                                </td>

                                <td>
                                    {{ $student->college ?: 'Not provided' }}
                                </td>

                                <td class="program">
                                    {{ $student->program ?: 'Not provided' }}
                                </td>

                                <td>
                                    <span class="year-badge">
                                        {{ $student->year_level ?: 'Not provided' }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <h3>No students found</h3>

                                        @if ($search !== '')
                                            <p>
                                                No student accounts matched
                                                "{{ $search }}".
                                                Try another name, email,
                                                or student number.
                                            </p>
                                        @else
                                            <p>
                                                There are currently no
                                                registered student accounts.
                                            </p>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

            </div>

            @if ($students->hasPages())
                <div class="pagination-wrapper">

                    <p class="pagination-info">
                        Showing {{ $students->firstItem() }}
                        to {{ $students->lastItem() }}
                        of {{ $students->total() }} students
                    </p>

                    <div class="pagination-links">
                        {{ $students->links() }}
                    </div>

                </div>
            @endif

        </section>

    </main>

    <footer>
        PLMun Campus Connect &copy; {{ date('Y') }}.
        Administrator Portal.
    </footer>

</body>
</html>
