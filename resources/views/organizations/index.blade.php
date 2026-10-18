<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Organizations | PLMun Campus Connect</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --navy: #172b4d;
            --gold: #c9a04a;
            --cream: #faf9f6;
            --muted: #758096;
            --border: #e9e5dc;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: var(--cream);
            color: var(--navy);
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

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

        .university-logo {
            width: 44px;
            height: 44px;
            object-fit: contain;
            border-radius: 50%;
        }

        .nav-link {
            color: var(--navy);
            font-size: 14px;
            font-weight: 600;
        }

        .page-heading { padding: 50px 0 25px; }

        .eyebrow {
            color: #a67c2e;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .page-heading h1 {
            font-size: clamp(32px, 5vw, 46px);
            font-weight: 800;
        }

        .page-heading p,
        .organization-description { color: var(--muted); line-height: 1.8; }

        .btn-primary-custom {
            display: inline-block;
            padding: 12px 17px;
            border: 1px solid var(--navy);
            border-radius: 10px;
            background: var(--navy);
            color: white;
            text-decoration: none;
            font-weight: 700;
        }

        .btn-primary-custom:hover {
            background: #263f68;
            color: white;
        }

        .filter-panel, .organization-card, .empty-state {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
        }

        .filter-panel {
            padding: 22px;
            margin: 22px 0 28px;
        }

        .form-label { font-size: 14px; font-weight: 700; }

        .form-control, .form-select {
            padding: 12px;
            border-color: var(--border);
            border-radius: 10px;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(201,160,74,.15);
        }

        .results-count { color: var(--muted); font-size: 13px; }

        .organization-card {
            height: 100%;
            padding: 24px;
            overflow-wrap: anywhere;
            transition: transform .2s, box-shadow .2s;
        }

        .organization-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(23,43,77,.07);
        }

        .category-label {
            display: inline-block;
            margin-bottom: 15px;
            color: #a67c2e;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .organization-logo {
            display: block;
            width: 85px;
            height: 85px;
            margin-bottom: 15px;
            border-radius: 12px;
            object-fit: contain;
        }

        .organization-card h2 {
            font-size: 20px;
            font-weight: 800;
            overflow-wrap: anywhere;
        }

        .organization-description {
            font-size: 14px;
            white-space: pre-line;
        }

        .contact-info {
            font-size: 13px;
            line-height: 1.8;
            overflow-wrap: anywhere;
        }

        .contact-info a { color: var(--navy); }

        .organization-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 20px;
        }

        .btn-edit, .btn-delete {
            display: inline-block;
            padding: 8px 13px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
        }

        .btn-edit {
            border: 1px solid #d5dce7;
            color: var(--navy);
        }

        .btn-delete {
            border: 1px solid #efb4b0;
            background: white;
            color: #b42318;
        }

        .empty-state {
            padding: 40px 20px;
            text-align: center;
        }

        .empty-state h2 { font-weight: 800; }

        .empty-state p { color: var(--muted); }

        footer {
            margin-top: 55px;
            padding: 25px 0;
            border-top: 1px solid var(--border);
            background: white;
            color: var(--muted);
            font-size: 12px;
        }

        @media (max-width: 576px) {
            .brand { font-size: 15px; }
            .university-logo { width: 38px; height: 38px; }
            .page-heading { padding-top: 32px; }
            .organization-card { padding: 18px; }
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container py-2">
        <a href="{{ route('home') }}" class="brand">
            <img src="{{ asset('images/logo2.jpg') }}"
                 alt="PLMun University Seal"
                 class="university-logo">
            <span>PLMun Campus Connect</span>
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <div class="navbar-nav ms-auto gap-lg-3">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
                <a class="nav-link" href="{{ route('organizations.index') }}">Organizations</a>
                <a class="nav-link" href="{{ route('home') }}#events">Events</a>

                @auth
                    <a class="nav-link" href="{{ route('profile') }}">My Profile</a>

                    @if (auth()->user()->isAdmin())
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                    @endif

                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-dark mt-1">
                            Logout
                        </button>
                    </form>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<main class="container pb-4">

    <header class="page-heading">
        <span class="eyebrow">Find your community</span>
        <h1 class="mt-3 mb-2">Student Organizations</h1>
        <p>Explore communities, discover your interests, and find your place on campus.</p>

        @auth
            @if (auth()->user()->isAdmin())
                <a href="{{ route('organizations.create') }}" class="btn-primary-custom">
                    + Add Organization
                </a>
            @endif
        @endauth
    </header>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close"
                    data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <section class="filter-panel">
        <div class="row g-3 align-items-end">
            <div class="col-md-7">
                <label for="searchInput" class="form-label">Search organizations</label>
                <input type="search" id="searchInput" class="form-control"
                       placeholder="Type an organization name...">
            </div>

            <div class="col-md-5">
                <label for="categoryFilter" class="form-label">Filter by category</label>
                <select id="categoryFilter" class="form-select">
                    <option value="">All Categories</option>
                    <option value="academic">Academic</option>
                    <option value="technology">Technology</option>
                    <option value="arts and culture">Arts and Culture</option>
                    <option value="service and leadership">Service and Leadership</option>
                    <option value="sports">Sports</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-12 d-flex justify-content-between align-items-center flex-wrap gap-2">
                <span id="resultsCount" class="results-count"></span>
                <button type="button" id="clearFilters"
                        class="btn btn-sm btn-outline-secondary">
                    Clear filters
                </button>
            </div>
        </div>
    </section>

    @if ($organizations->isNotEmpty())
        <div class="row g-4" id="organizationList">
            @foreach ($organizations as $organization)
                <div class="col-md-6 col-lg-4 organization-item"
                     data-name="{{ strtolower($organization->name) }}"
                     data-category="{{ strtolower($organization->category ?? 'other') }}">

                    <article class="organization-card">
                        <span class="category-label">
                            {{ $organization->category ?? 'Other' }}
                        </span>

                        @if ($organization->logo)
                            <img src="{{ asset('storage/' . $organization->logo) }}"
                                 alt="{{ $organization->name }} logo"
                                 class="organization-logo"
                                 loading="lazy">
                        @endif

                        <h2>{{ $organization->name }}</h2>

                        <p class="organization-description mb-3">
                            {{ $organization->description }}
                        </p>

                        @if ($organization->email)
                            <p class="contact-info">
                                <strong>Contact:</strong>
                                <a href="mailto:{{ $organization->email }}">
                                    {{ $organization->email }}
                                </a>
                            </p>
                        @endif

                        @if ($organization->facebook_url)
                            <p class="contact-info">
                                <strong>Facebook:</strong>
                                <a href="{{ $organization->facebook_url }}"
                                   target="_blank" rel="noopener noreferrer">
                                    Visit page ↗
                                </a>
                            </p>
                        @endif

                        @auth
                            @if (auth()->user()->isAdmin())
                                <div class="organization-actions">
                                    <a href="{{ route('organizations.edit', $organization) }}"
                                       class="btn-edit">Edit</a>

                                    <form action="{{ route('organizations.destroy', $organization) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this organization?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">Delete</button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </article>
                </div>
            @endforeach
        </div>

        <div id="noResults" class="empty-state d-none mt-4">
            <h2>No organizations found</h2>
            <p>Try another name or choose a different category.</p>
        </div>
    @else
        <div class="empty-state">
            <h2>No organizations yet</h2>
            <p>There are currently no organizations in the directory.</p>

            @auth
                @if (auth()->user()->isAdmin())
                    <a href="{{ route('organizations.create') }}" class="btn-primary-custom">
                        + Add Organization
                    </a>
                @endif
            @endauth
        </div>
    @endif

</main>

<footer>
    <div class="container d-flex flex-column flex-md-row justify-content-between gap-2">
        <span>PLMun Campus Connect</span>
        <span>Connecting students, organizations, and campus life.</span>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const searchInput = document.getElementById('searchInput');
    const categoryFilter = document.getElementById('categoryFilter');
    const clearFilters = document.getElementById('clearFilters');
    const resultsCount = document.getElementById('resultsCount');
    const noResults = document.getElementById('noResults');
    const organizationItems = [...document.querySelectorAll('.organization-item')];

    function filterOrganizations() {
        const searchTerm = searchInput.value.trim().toLowerCase();
        const selectedCategory = categoryFilter.value.toLowerCase();
        let visibleCount = 0;

        organizationItems.forEach(function (item) {
            const matchesName = (item.dataset.name || '').includes(searchTerm);
            const matchesCategory = !selectedCategory ||
                (item.dataset.category || '') === selectedCategory;
            const visible = matchesName && matchesCategory;

            item.classList.toggle('d-none', !visible);
            if (visible) visibleCount++;
        });

        resultsCount.textContent =
            'Showing ' + visibleCount + ' of ' +
            organizationItems.length + ' organizations';

        if (noResults) {
            noResults.classList.toggle(
                'd-none',
                visibleCount !== 0 || organizationItems.length === 0
            );
        }
    }

    searchInput.addEventListener('input', filterOrganizations);
    categoryFilter.addEventListener('change', filterOrganizations);

    clearFilters.addEventListener('click', function () {
        searchInput.value = '';
        categoryFilter.value = '';
        filterOrganizations();
    });

    filterOrganizations();
</script>

</body>
</html>
