<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Organization | PLMun Campus Connect</title>

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
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--cream);
            color: var(--navy);
            margin: 0;
        }

        /* PAGE TRANSITION */
        #page-transition {
            position: fixed;
            inset: 0;
            z-index: 99999;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #14294d;
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
            border-top-color: #c99732;
            border-radius: 50%;
            animation: campusConnectSpin 0.7s linear infinite;
        }

        @keyframes campusConnectSpin {
            to {
                transform: rotate(360deg);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            #page-transition {
                transition: none;
            }

            .transition-spinner {
                animation: none;
            }
        }

        /* NAVIGATION AND UNIVERSITY LOGO */
        .navbar {
            background: #fff;
            border-bottom: 1px solid var(--border);
        }

        .brand-name {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-weight: 800;
            font-size: 18px;
            color: var(--navy);
            text-decoration: none;
        }

        .university-logo {
            display: block;
            width: 44px;
            height: 44px;
            object-fit: contain;
            border-radius: 50%;
            background: #fff;
            flex-shrink: 0;
        }

        /* PAGE HEADING */
        .page-heading {
            padding: 45px 0 25px;
        }

        .eyebrow {
            color: var(--gold);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .page-heading h1 {
            font-size: clamp(28px, 5vw, 40px);
            font-weight: 800;
            letter-spacing: -1px;
            margin-top: 12px;
        }

        .page-heading p {
            color: var(--muted);
            line-height: 1.8;
        }

        /* FORM CARD */
        .form-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: clamp(20px, 4vw, 35px);
            margin-bottom: 50px;
        }

        .form-label {
            font-weight: 700;
            font-size: 14px;
        }

        .form-control,
        .form-select {
            border-color: var(--border);
            border-radius: 10px;
            padding: 12px 14px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(201, 160, 74, .15);
        }

        .text-muted,
        .form-text {
            color: var(--muted) !important;
            font-size: 12px;
        }

        /* BUTTONS */
        .btn-primary-custom {
            background: var(--navy);
            color: #fff;
            border: 1px solid var(--navy);
            border-radius: 10px;
            padding: 12px 18px;
            font-weight: 700;
            transition: background 0.2s ease,
                        transform 0.2s ease;
        }

        .btn-primary-custom:hover {
            background: #263f68;
            color: #fff;
            transform: translateY(-2px);
        }

        .btn-cancel {
            display: inline-block;
            color: var(--navy);
            text-decoration: none;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 12px 18px;
            font-weight: 700;
            transition: background 0.2s ease;
        }

        .btn-cancel:hover {
            background: #f4f2ed;
            color: var(--navy);
        }

        /* FOOTER */
        footer {
            border-top: 1px solid var(--border);
            padding: 25px 0;
            color: var(--muted);
            font-size: 12px;
            background: #fff;
        }

        @media (max-width: 576px) {
            .brand-name {
                font-size: 15px;
            }

            .university-logo {
                width: 38px;
                height: 38px;
            }

            .page-heading {
                padding-top: 35px;
            }
        }
    </style>
</head>

<body>

<!-- PAGE TRANSITION OVERLAY -->
<div id="page-transition" aria-hidden="true">
    <div class="transition-spinner"></div>
</div>

<!-- NAVIGATION WITH PLMUN LOGO -->
<nav class="navbar">
    <div class="container py-2">
        <a href="/" class="brand-name">
            <img
                src="{{ asset('images/logo2.jpg') }}"
                alt="PLMun University Seal"
                class="university-logo"
            >
            <span>PLMun Campus Connect</span>
        </a>
    </div>
</nav>

<main class="container pb-4">

    <!-- PAGE INTRODUCTION -->
    <header class="page-heading">
        <span class="eyebrow">Campus community</span>

        <h1>Add an Organization</h1>

        <p>
            Introduce a student organization and help students discover
            a community that matches their interests.
        </p>
    </header>

    <!-- VALIDATION ERRORS -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Please correct the following:</strong>

            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- ORGANIZATION FORM -->
    <section class="form-card">

        <form action="{{ route('organizations.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <!-- ORGANIZATION NAME -->
            <div class="mb-4">
                <label for="name" class="form-label">
                    Organization Name *
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}"
                    placeholder="e.g. PLMun Computer Studies Society"
                    maxlength="150"
                    required
                >

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- CATEGORY -->
            <div class="mb-4">
                <label for="category" class="form-label">
                    Category *
                </label>

                <select
                    id="category"
                    name="category"
                    class="form-select @error('category') is-invalid @enderror"
                    required
                >
                    <option value="">Choose a category</option>

                    <option value="Academic"
                        {{ old('category') == 'Academic' ? 'selected' : '' }}>
                        Academic
                    </option>

                    <option value="Technology"
                        {{ old('category') == 'Technology' ? 'selected' : '' }}>
                        Technology
                    </option>

                    <option value="Arts and Culture"
                        {{ old('category') == 'Arts and Culture' ? 'selected' : '' }}>
                        Arts and Culture
                    </option>

                    <option value="Service and Leadership"
                        {{ old('category') == 'Service and Leadership' ? 'selected' : '' }}>
                        Service and Leadership
                    </option>

                    <option value="Sports"
                        {{ old('category') == 'Sports' ? 'selected' : '' }}>
                        Sports
                    </option>

                    <option value="Other"
                        {{ old('category') == 'Other' ? 'selected' : '' }}>
                        Other
                    </option>
                </select>

                @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- DESCRIPTION -->
            <div class="mb-4">
                <label for="description" class="form-label">
                    Organization Description *
                </label>

                <textarea
                    id="description"
                    name="description"
                    class="form-control @error('description') is-invalid @enderror"
                    rows="5"
                    maxlength="2000"
                    placeholder="Describe the organization's mission, activities, and goals..."
                    required
                >{{ old('description') }}</textarea>

                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- CONTACT EMAIL -->
            <div class="mb-4">
                <label for="email" class="form-label">
                    Contact Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}"
                    placeholder="organization@example.com"
                    maxlength="255"
                >

                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- FACEBOOK PAGE -->
            <div class="mb-4">
                <label for="facebook_url" class="form-label">
                    Facebook Page URL
                </label>

                <input
                    type="url"
                    id="facebook_url"
                    name="facebook_url"
                    class="form-control @error('facebook_url') is-invalid @enderror"
                    value="{{ old('facebook_url') }}"
                    placeholder="https://www.facebook.com/yourorganization"
                    maxlength="255"
                >

                @error('facebook_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- ORGANIZATION LOGO UPLOAD -->
            <div class="mb-4">
                <label for="logo" class="form-label">
                    Organization Logo
                </label>

                <input
                    type="file"
                    id="logo"
                    name="logo"
                    class="form-control @error('logo') is-invalid @enderror"
                    accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                >

                <div class="form-text mt-2">
                    Optional. Accepted formats: JPG, PNG, or WebP.
                    Maximum size: 2 MB.
                </div>

                @error('logo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- FORM BUTTONS -->
            <div class="d-flex flex-wrap gap-3 mt-4">
                <button type="submit" class="btn-primary-custom">
                    Add Organization
                </button>

                <a href="{{ route('organizations.index') }}"
                   class="btn-cancel">
                    Cancel
                </a>
            </div>

        </form>

    </section>

</main>

<!-- FOOTER -->
<footer>
    <div class="container">
        PLMun Campus Connect — Connecting students and campus communities.
    </div>
</footer>

<!-- PAGE TRANSITIONS SCRIPT -->
<script src="{{ asset('js/page-transitions.js') }}"></script>

</body>
</html>
