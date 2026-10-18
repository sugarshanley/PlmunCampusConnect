<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Organization | PLMun Campus Connect</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

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

        /* NAVIGATION */
        .navbar {
            background: #ffffff;
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

        /* CIRCULAR PLMUN SEAL */
        .university-logo {
            display: block;
            width: 44px;
            height: 44px;
            object-fit: contain;
            border-radius: 50%;
            background: #ffffff;
            flex-shrink: 0;
        }

        /* PAGE HEADER */
        .page-heading {
            padding: 45px 0 25px;
        }

        .eyebrow {
            color: #a67c2e;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        /* FORM */
        .form-card {
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: clamp(20px, 4vw, 35px);
            margin-bottom: 50px;
        }

        .form-label {
            font-size: 14px;
            font-weight: 700;
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
            box-shadow: 0 0 0 3px rgba(201, 160, 74, 0.15);
        }

        .current-logo {
            width: 120px;
            height: 120px;
            object-fit: contain;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 8px;
            background: #ffffff;
        }

        .btn-primary-custom {
            background: var(--navy);
            color: #ffffff;
            border: 1px solid var(--navy);
            border-radius: 10px;
            padding: 12px 18px;
            font-weight: 700;
        }

        .btn-primary-custom:hover {
            background: #263f68;
            color: #ffffff;
        }

        .btn-cancel {
            display: inline-block;
            color: var(--navy);
            text-decoration: none;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 12px 18px;
            font-weight: 700;
        }

        .btn-cancel:hover {
            background: var(--cream);
        }

        /* FOOTER */
        footer {
            background: #ffffff;
            border-top: 1px solid var(--border);
            padding: 25px 0;
            color: var(--muted);
            font-size: 12px;
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
                padding-top: 30px;
            }
        }
    </style>
</head>

<body>

<!-- NAVIGATION WITH PLMUN LOGO -->
<nav class="navbar">
    <div class="container py-2">

        <a href="/" class="brand">
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

    <!-- PAGE HEADER -->
    <header class="page-heading">
        <span class="eyebrow">Manage your listing</span>

        <h1 class="fw-bold mt-3">Edit Organization</h1>

        <p class="text-secondary">
            Update the organization's details and logo.
        </p>
    </header>

    <!-- SUCCESS MESSAGE -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>
        </div>
    @endif

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

    <!-- EDIT ORGANIZATION FORM -->
    <section class="form-card">

        <form
            action="{{ route('organizations.update', $organization) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

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
                    value="{{ old('name', $organization->name) }}"
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

                    @foreach ([
                        'Academic',
                        'Technology',
                        'Arts and Culture',
                        'Service and Leadership',
                        'Sports',
                        'Other'
                    ] as $category)

                        <option
                            value="{{ $category }}"
                            {{ old('category', $organization->category) === $category ? 'selected' : '' }}
                        >
                            {{ $category }}
                        </option>

                    @endforeach
                </select>

                @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- DESCRIPTION -->
            <div class="mb-4">
                <label for="description" class="form-label">
                    Description *
                </label>

                <textarea
                    id="description"
                    name="description"
                    class="form-control @error('description') is-invalid @enderror"
                    rows="5"
                    maxlength="2000"
                    required
                >{{ old('description', $organization->description) }}</textarea>

                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- EMAIL -->
            <div class="mb-4">
                <label for="email" class="form-label">
                    Contact Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $organization->email) }}"
                    maxlength="255"
                >

                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- FACEBOOK URL -->
            <div class="mb-4">
                <label for="facebook_url" class="form-label">
                    Facebook Page URL
                </label>

                <input
                    type="url"
                    id="facebook_url"
                    name="facebook_url"
                    class="form-control @error('facebook_url') is-invalid @enderror"
                    value="{{ old('facebook_url', $organization->facebook_url) }}"
                    maxlength="255"
                >

                @error('facebook_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- CURRENT ORGANIZATION LOGO -->
            @if ($organization->logo)
                <div class="mb-4">
                    <label class="form-label d-block">
                        Current Organization Logo
                    </label>

                    <img
                        src="{{ asset('storage/' . $organization->logo) }}"
                        alt="{{ $organization->name }} logo"
                        class="current-logo"
                    >
                </div>
            @endif

            <!-- UPLOAD NEW ORGANIZATION LOGO -->
            <div class="mb-4">
                <label for="logo" class="form-label">
                    Organization Logo
                </label>

                <input
                    type="file"
                    id="logo"
                    name="logo"
                    class="form-control @error('logo') is-invalid @enderror"
                    accept=".jpg,.jpeg,.png,.webp"
                >

                <div class="form-text">
                    Optional. JPG, PNG, or WebP; maximum 2 MB.
                </div>

                @error('logo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div id="selectedFile" class="form-text mt-2">
                    No new image selected.
                </div>

                <div class="mt-3">
                    <img
                        id="logoPreview"
                        src=""
                        alt="Selected logo preview"
                        class="current-logo d-none"
                    >
                </div>
            </div>

            <!-- FORM BUTTONS -->
            <div class="d-flex flex-wrap gap-3 mt-4">

                <button type="submit" class="btn-primary-custom">
                    Update Organization
                </button>

                <a
                    href="{{ route('organizations.index') }}"
                    class="btn-cancel"
                >
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const logoInput = document.getElementById('logo');
    const selectedFile = document.getElementById('selectedFile');
    const logoPreview = document.getElementById('logoPreview');

    logoInput.addEventListener('change', function () {
        if (this.files && this.files.length > 0) {
            const file = this.files[0];

            selectedFile.textContent =
                'Selected: ' + file.name +
                ' (' + (file.size / 1024).toFixed(1) + ' KB)';

            if (logoPreview.src) {
                URL.revokeObjectURL(logoPreview.src);
            }

            logoPreview.src = URL.createObjectURL(file);
            logoPreview.classList.remove('d-none');
        } else {
            selectedFile.textContent = 'No new image selected.';
            logoPreview.removeAttribute('src');
            logoPreview.classList.add('d-none');
        }
    });
</script>

</body>
</html>
