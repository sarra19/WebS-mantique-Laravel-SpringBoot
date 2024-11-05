<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS and PUG.js. It's fully customizable and modular.">
    <meta property="og:title" content="Create User">
    <title>Create User</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/assets/css/main.css'])
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="app sidebar-mini">
    <header class="app-header">
        <a class="app-header__logo" href="{{ route('indexBack') }}">EcoCycle</a>
        @include('BackOffice.partials.navbar')
    </header>

    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="bi bi-person-plus-fill"></i> Create User</h1>
                <p>Fill out the form below to add a new user.</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
                <li class="breadcrumb-item"><a href="#">Create User</a></li>
            </ul>
        </div>

        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger" id="errorAlert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="col-md-12">
            <div class="tile">
                <form id="userForm" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="name">Full Name</label>
                                <input class="form-control" id="name" name="name" type="text" placeholder="Enter full name" value="{{ old('name') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="username">Username</label>
                                <input class="form-control" id="username" name="username" type="text" placeholder="Enter Username" value="{{ old('username') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" id="email" name="email" type="email" placeholder="Enter email" value="{{ old('email') }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="phone">Phone Number</label>
                                <input class="form-control" id="phone" name="phone" type="text" placeholder="Enter phone number" value="{{ old('phone') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15);" required>
                            </div>

                          
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" id="password" name="password" type="password" placeholder="Enter password" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="password_confirmation">Confirm Password</label>
                                <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm password" required>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Create User</button>
                </form>
            </div>
        </div>
    </main>

    @vite(['resources/assets/js/main.js'])
</body>
</html>
