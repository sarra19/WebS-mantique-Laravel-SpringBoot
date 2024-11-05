<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="View details of the selected recycled content.">
    <title>Recycled Content Details - EcoCycle</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS -->
    @vite(['resources/assets/css/main.css'])
    <!-- Font-icon css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .card {
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 2rem;
            text-align: center; /* Center text in the card body */
        }
        .btn-back {
            margin-top: 1rem; /* Add some spacing above the button */
        }
    </style>
</head>

<body class="app sidebar-mini">
    <!-- Navbar -->
    <header class="app-header">
        <a class="app-header__logo" href="{{ route('indexBack') }}">EcoCycle</a>
        @include('BackOffice.partials.navbar')
    </header>
    <!-- Sidebar menu -->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="bi bi-file-earmark-text"></i> Recycled Content Details</h1>
                <p>Details of the selected recycled content entry.</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
                <li class="breadcrumb-item"><a href="#">Recycled Content Details</a></li>
            </ul>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="row g-0">
                        <div class="col-md-12">
                            <div class="card-body d-flex flex-column justify-content-center" style="height: 100%;">
                                <h5 class="card-title fs-3 fw-bold text-primary">{{ $recycledContent->title }}</h5> <!-- Emphasized title -->
                                <p class="card-text fs-6 text-muted mt-2"><strong>Percentage:</strong> {{ $recycledContent->percentage }}%</p>
                                <p class="card-text fs-6 text-muted mt-2"><strong>Description:</strong> {{ $recycledContent->content_description }}</p>
                                <!-- You can add additional recycled content-related details here -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-start"> <!-- Align button to the left -->
                    <a href="{{ route('recycled-content.index') }}" class="btn btn-primary btn-back">Back to Recycled Content</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Essential javascripts for application to work -->
    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    @vite(['resources/assets/js/bootstrap.min.js'])
    @vite(['resources/assets/js/main - Back.js'])
</body>

</html>
