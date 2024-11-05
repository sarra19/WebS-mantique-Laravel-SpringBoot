<!-- resources/views/backoffice/user/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <!-- Main CSS and FontAwesome -->
    @vite(['resources/assets/css/main.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
                <h1><i class="bi bi-people"></i> User List</h1>
                <p>Manage all registered users here</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
                <li class="breadcrumb-item"><a href="#">User List</a></li>
            </ul>
        </div>

        <div class="d-flex justify-content-between mb-3">
            <!-- Search Form -->
         
            <!-- Add New User Button -->
            <a href="{{ route('userCreate') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add user 
            </a>        </div>

        <!-- User Table -->
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ ucfirst($user->role) }}</td>
                               
                                <td>
                                <a href="{{ route('showuser', $user->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i> View</a>
                                <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Edit</a>
                                    <form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');"><i class="bi bi-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </main>

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</body>
</html>
