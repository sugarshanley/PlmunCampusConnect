<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event | PLMun Campus Connect</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --navy: #172b4d;
            --gold: #c9a04a;
            --cream: #faf9f6;
            --muted: #758096;
            --border: #e9e5dc;
        }

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
            object-fit: contain;
            border-radius: 50%;
        }

        .page-container {
            max-width: 850px;
            margin: 40px auto;
            padding: 0 15px;
        }

        .form-card {
            background: white;
            padding: 30px;
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(23, 43, 77, .05);
        }

        .eyebrow {
            color: #a67c2e;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        h1 {
            font-size: clamp(28px, 4vw, 38px);
            font-weight: 800;
        }

        .form-label {
            font-weight: 700;
            font-size: 14px;
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

        .btn-navy {
            padding: 12px 18px;
            background: var(--navy);
            color: white;
            border: 1px solid var(--navy);
            border-radius: 9px;
            font-weight: 700;
        }

        .btn-navy:hover {
            background: #263f68;
            color: white;
        }

        .btn-cancel {
            display: inline-block;
            padding: 12px 18px;
            color: var(--navy);
            border: 1px solid var(--border);
            border-radius: 9px;
            text-decoration: none;
            font-weight: 700;
        }

        .muted { color: var(--muted); }

        @media (max-width: 576px) {
            .form-card { padding: 20px; }
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="container py-2">
        <a href="{{ route('home') }}" class="brand">
            <img src="{{ asset('images/logo2.jpg') }}" alt="PLMun logo">
            PLMun Campus Connect
        </a>
    </div>
</nav>

<main class="page-container">

    <div class="mb-4">
        <span class="eyebrow">Event Management</span>
        <h1 class="mt-2 mb-2">Create Campus Event</h1>
        <p class="muted">Fill in the information below to add a campus event.</p>
    </div>

    <section class="form-card">

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Please fix the following errors:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('events.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="title" class="form-label">Event Title *</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title') }}"
                    maxlength="255"
                    placeholder="e.g. Campus Leadership Seminar"
                    required
                >
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="organization_id" class="form-label">Organization *</label>
                <select
                    id="organization_id"
                    name="organization_id"
                    class="form-select @error('organization_id') is-invalid @enderror"
                    required
                >
                    <option value="">Select an organization</option>

                    @foreach ($organizations as $organization)
                        <option
                            value="{{ $organization->id }}"
                            {{ old('organization_id') == $organization->id ? 'selected' : '' }}
                        >
                            {{ $organization->name }}
                        </option>
                    @endforeach
                </select>
                @error('organization_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                @if ($organizations->isEmpty())
                    <p class="text-danger small mt-2">
                        You need to add an organization before creating an event.
                    </p>
                @endif
            </div>

            <div class="mb-4">
                <label for="description" class="form-label">Description</label>
                <textarea
                    id="description"
                    name="description"
                    class="form-control @error('description') is-invalid @enderror"
                    rows="5"
                    maxlength="5000"
                    placeholder="Describe the event, its purpose, and activities..."
                >{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="venue" class="form-label">Venue *</label>
                <input
                    type="text"
                    id="venue"
                    name="venue"
                    class="form-control @error('venue') is-invalid @enderror"
                    value="{{ old('venue') }}"
                    maxlength="255"
                    placeholder="e.g. PLMun Auditorium"
                    required
                >
                @error('venue')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="starts_at" class="form-label">Event Date and Time *</label>
                <input
                    type="datetime-local"
                    id="starts_at"
                    name="starts_at"
                    class="form-control @error('starts_at') is-invalid @enderror"
                    value="{{ old('starts_at') }}"
                    required
                >
                @error('starts_at')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="capacity" class="form-label">Maximum Attendees</label>
                <input
                    type="number"
                    id="capacity"
                    name="capacity"
                    class="form-control @error('capacity') is-invalid @enderror"
                    value="{{ old('capacity') }}"
                    min="1"
                    placeholder="Leave blank if unlimited"
                >
                @error('capacity')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="form-label">Event Status *</label>
                <select
                    id="status"
                    name="status"
                    class="form-select @error('status') is-invalid @enderror"
                    required
                >
                    <option value="draft" {{ old('status', 'draft') == 'draft' ? 'selected' : '' }}>
                        Draft — not visible to students
                    </option>
                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>
                        Published — visible to students
                    </option>
                    <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>
                        Cancelled
                    </option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex flex-wrap gap-3 mt-4">
                <button type="submit" class="btn-navy"
                    {{ $organizations->isEmpty() ? 'disabled' : '' }}>
                    Create Event
                </button>

                <a href="{{ route('events.index') }}" class="btn-cancel">
                    Cancel
                </a>
            </div>

        </form>
    </section>

</main>

</body>
</html>
