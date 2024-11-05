<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recycled Content - EcoCycle</title>
    <!-- Main CSS -->
    @vite(['resources/assets/css/main.css'])
    <!-- Font Awesome and Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
                <h1><i class="bi bi-recycle"></i> Recycled Content</h1>
                <p>Manage recycled content details for better transparency.</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
                <li class="breadcrumb-item"><a href="#">Recycled Content</a></li>
            </ul>
        </div>

        <!-- Add New Recycled Content Button -->
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('recycled-content.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add New Recycled Content
            </a>
        </div>

        <!-- Recycled Content Table -->
        <div class="row">
            @if(session('success'))
                <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Recycled Content List</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Percentage</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recycledContents as $recycledContent)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $recycledContent->percentage }}%</td>
                                    <td>{{ $recycledContent->content_description ?? 'No description available' }}</td>
                                    <td>
                                        <a href="{{ route('recycled-content.show', $recycledContent->id) }}" class="btn btn-sm btn-info">
                                            <i class="bi bi-eye"></i> View
                                        </a>
                                        <a href="{{ route('recycled-content.edit', $recycledContent->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('recycled-content.destroy', $recycledContent->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this recycled content?');">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">No recycled content available.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Essential JavaScript for application to work -->
    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    @vite(['resources/assets/js/bootstrap.min.js'])
    @vite(['resources/assets/js/main - Back.js'])
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const alert = document.getElementById('successAlert');
            if (alert) {
                setTimeout(function() {
                    alert.classList.remove('show');
                    alert.classList.add('fade');
                    setTimeout(function() {
                        alert.remove();
                    }, 500);
                }, 3000);
            }
        });
    </script>
</body>
</html>
