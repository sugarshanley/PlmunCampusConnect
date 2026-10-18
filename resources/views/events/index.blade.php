<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Events | PLMun Campus Connect</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
            font-family: Arial, Helvetica, sans-serif;
        }

        .navbar {
            background: white;
            border-bottom: 1px solid var(--border);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--navy);
            text-decoration: none;
            font-weight: 800;
        }

        .brand img {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            object-fit: contain;
        }

        .nav-link {
            color: var(--navy);
            font-weight: 600;
        }

        .page-heading { padding: 45px 0 25px; }

        .eyebrow {
            color: #a67c2e;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .page-heading h1 {
            font-size: clamp(30px, 5vw, 44px);
            font-weight: 800;
        }

        .muted { color: var(--muted); }

        .btn-navy {
            display: inline-block;
            padding: 11px 16px;
            background: var(--navy);
            color: white;
            border: 1px solid var(--navy);
            border-radius: 9px;
            text-decoration: none;
            font-weight: 700;
        }

        .btn-navy:hover {
            background: #263f68;
            color: white;
        }

        .filter-panel {
            margin-bottom: 28px;
            padding: 22px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
        }

        .form-label {
            font-size: 14px;
            font-weight: 700;
        }

        .form-control, .form-select {
            padding: 12px;
            border-color: var(--border);
            border-radius: 9px;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(201, 160, 74, .15);
        }

        .results-count {
            color: var(--muted);
            font-size: 13px;
        }

        .event-card {
            height: 100%;
            padding: 23px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow-wrap: anywhere;
            transition: transform .2s, box-shadow .2s;
        }

        .event-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(23, 43, 77, .07);
        }

        .event-date {
            display: inline-block;
            padding: 7px 10px;
            margin-bottom: 14px;
            background: #f3ead6;
            color: #785a16;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 700;
        }

        .event-card h2 {
            font-size: 21px;
            font-weight: 800;
        }

        .event-description {
            color: var(--muted);
            line-height: 1.7;
            white-space: pre-line;
        }

        .status {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 20px;
            background: #eee;
            color: #444;
            font-size: 11px;
            font-weight: 700;
            text-transform: capitalize;
        }

        .status-published {
            background: #e3f5e8;
            color: #216e39;
        }

        .status-cancelled {
            background: #fde8e7;
            color: #a3211b;
        }

        .event-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 18px;
        }

        .btn-edit, .btn-delete {
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
        }

        .btn-edit {
            border: 1px solid #d5dce7;
            background: white;
            color: var(--navy);
            text-decoration: none;
        }

        .btn-delete {
            border: 1px solid #efb4b0;
            background: white;
            color: #b42318;
        }

        .empty-state {
            padding: 40px 20px;
            text-align: center;
            background: white;
            border: 1px dashed #d9d3c7;
            border-radius: 16px;
        }

        footer {
            margin-top: 55px;
            padding: 24px 0;
            background: white;
            border-top: 1px solid var(--border);
            color: var(--muted);
            font-size: 12px;
        }

        @media (max-width: 576px) {
            .page-heading { padding-top: 32px; }
            .event-card { padding: 18px; }
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container py-2">

        <a href="{{ route('home') }}" class="brand">
            <img src="{{ asset('images/logo2.jpg') }}" alt="PLMun logo">
            <span>PLMun Campus Connect</span>
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <div class="navbar-nav ms-auto gap-lg-2">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
                <a class="nav-link" href="{{ route('organizations.index') }}">Organizations</a>
                <a class="nav-link" href="{{ route('events.index') }}">Events</a>

                @auth
                    <a class="nav-link" href="{{ route('profile') }}">My Profile</a>

                    @if (auth()->user()->isAdmin())
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            Admin Dashboard
                        </a>
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
        <span class="eyebrow">Campus Life</span>

        <h1 class="mt-3 mb-2">Discover Campus Events</h1>

        <p class="muted">
            Find activities, connect with organizations, and get involved on campus.
        </p>

        @auth
            @if (auth()->user()->isAdmin())
                <a href="{{ route('events.create') }}" class="btn-navy">
                    + Create Event
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

    @if ($errors->any())
        <div class="alert alert-danger">
            Please check the form for errors.
        </div>
    @endif

    <!-- SEARCH AND FILTERS -->
    <section class="filter-panel">
        <div class="row g-3 align-items-end">

            <div class="col-md-7">
                <label for="eventSearch" class="form-label">Search events</label>
                <input
                    type="search"
                    id="eventSearch"
                    class="form-control"
                    placeholder="Search by event, venue, or organization..."
                >
            </div>

            <div class="col-md-5">
                <label for="statusFilter" class="form-label">Filter by status</label>
                <select id="statusFilter" class="form-select">
                    <option value="">All available statuses</option>
                    <option value="published">Published</option>
                    <option value="cancelled">Cancelled</option>

                    @auth
                        @if (auth()->user()->isAdmin())
                            <option value="draft">Draft</option>
                        @endif
                    @endauth
                </select>
            </div>

            <div class="col-12 d-flex justify-content-between align-items-center flex-wrap gap-2">
                <span id="resultsCount" class="results-count" aria-live="polite"></span>

                <button type="button" id="clearFilters"
                        class="btn btn-sm btn-outline-secondary">
                    Clear filters
                </button>
            </div>

        </div>
    </section>

    <!-- EVENTS -->
    <div class="row g-4" id="eventList">

        @forelse ($events as $event)

            @if ($event->status !== 'draft' || (auth()->check() && auth()->user()->isAdmin()))

                <div
                    class="col-md-6 col-lg-4 event-item"
                    data-search="{{ strtolower($event->title . ' ' . $event->venue . ' ' . ($event->organization->name ?? '')) }}"
                    data-status="{{ strtolower($event->status) }}"
                >
                    <article class="event-card">

                        <span class="event-date">
                            {{ $event->starts_at->format('M d, Y · h:i A') }}
                        </span>

                        <h2>{{ $event->title }}</h2>

                        <p class="muted small mb-2">
                            <strong>Organization:</strong>
                            {{ $event->organization->name ?? 'Organization unavailable' }}
                        </p>

                        <p class="muted small mb-3">
                            <strong>Venue:</strong> {{ $event->venue }}
                        </p>

                        <p class="event-description">
                            {{ $event->description ?: 'More event details will be announced soon.' }}
                        </p>

                        <div class="mb-2">
                            <span class="status status-{{ $event->status }}">
                                {{ $event->status }}
                            </span>

                            @if ($event->capacity)
                                <span class="muted small ms-2">
                                    Capacity: {{ $event->capacity }}
                                </span>
                            @endif
                        </div>

                        @auth
                            @if (auth()->user()->isAdmin())
                                <div class="event-actions">
                                    <a href="{{ route('events.edit', $event) }}"
                                       class="btn-edit">
                                        Edit
                                    </a>

                                    <form action="{{ route('events.destroy', $event) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this event?');">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-delete">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            @endif
                        @endauth

                    </article>
                </div>

            @endif

        @empty

            <div class="col-12">
                <div class="empty-state">
                    <h2>No events yet</h2>
                    <p class="muted">Campus events will appear here once they are added.</p>

                    @auth
                        @if (auth()->user()->isAdmin())
                            <a href="{{ route('events.create') }}" class="btn-navy">
                                Create First Event
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

        @endforelse

    </div>

    <div id="noResults" class="empty-state mt-4 d-none">
        <h2>No matching events found</h2>
        <p class="muted">Try another search term or clear the filters.</p>
    </div>

    @if ($events->hasPages())
        <div class="mt-4">
            {{ $events->links() }}
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
    const eventSearch = document.getElementById('eventSearch');
    const statusFilter = document.getElementById('statusFilter');
    const clearFilters = document.getElementById('clearFilters');
    const resultsCount = document.getElementById('resultsCount');
    const noResults = document.getElementById('noResults');

    const eventItems = [
        ...document.querySelectorAll('.event-item')
    ];

    function filterEvents() {
        const searchTerm = eventSearch.value.trim().toLowerCase();
        const selectedStatus = statusFilter.value.toLowerCase();

        let visibleCount = 0;

        eventItems.forEach(function (item) {
            const searchableText = item.dataset.search || '';
            const eventStatus = item.dataset.status || '';

            const matchesSearch = searchableText.includes(searchTerm);
            const matchesStatus =
                selectedStatus === '' || eventStatus === selectedStatus;

            const isVisible = matchesSearch && matchesStatus;

            item.classList.toggle('d-none', !isVisible);

            if (isVisible) {
                visibleCount++;
            }
        });

        resultsCount.textContent =
            'Showing ' + visibleCount + ' of ' +
            eventItems.length + ' events';

        noResults.classList.toggle(
            'd-none',
            visibleCount !== 0 || eventItems.length === 0
        );
    }

    eventSearch.addEventListener('input', filterEvents);
    statusFilter.addEventListener('change', filterEvents);

    clearFilters.addEventListener('click', function () {
        eventSearch.value = '';
        statusFilter.value = '';
        filterEvents();
    });

    filterEvents();
</script>

</body>
</html>
