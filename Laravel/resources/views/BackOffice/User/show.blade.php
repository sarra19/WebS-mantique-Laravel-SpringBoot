<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="EcoCycle Admin Panel - User Details">
    <title>User Details - EcoCycle</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    @vite(['resources/assets/css/main.css'])
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light background for better contrast */
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 2rem;
            text-align: left;
        }
        .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1rem;
        }
        .user-details h5 {
            color: #0d6efd; /* Primary color for name */
        }
        .user-details p {
            margin: 0.5rem 0;
            color: #6c757d; /* Muted color for better readability */
        }
        .user-details strong {
            color: #343a40; /* Darker color for labels */
        }
        .btn-back {
            margin-top: 2rem;
        }
    </style>
</head>
<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header">
        <a class="app-header__logo" href="{{ route('indexBack') }}">EcoCycle</a>
        @include('BackOffice.partials.navbar')
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="bi bi-person-circle"></i> User Details</h1>
                <p>Details of the selected user.</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
                <li class="breadcrumb-item"><a href="#">User Details</a></li>
            </ul>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="row g-0 align-items-center">
                        
                        <div class="col-md-8">
                            <div class="card-body user-details">
                                <h5 class="card-title fs-3 fw-bold">{{ $user->name }}</h5>
                                <h6 class="card-subtitle fs-5 text-muted">{{ $user->username }}</h6>

                                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                                <p class="card-text"><strong>Phone:</strong> {{ $user->phone }}</p>
                                <p class="card-text"><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
                                <p class="card-text"><strong>Joined:</strong> {{ $user->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
      
            </div>
        </div>
    </main>

    <!-- Essential javascripts for application to work-->
    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    @vite(['resources/assets/js/bootstrap.min.js'])
    @vite(['resources/assets/js/main - Back.js'])
</body>
</html>
