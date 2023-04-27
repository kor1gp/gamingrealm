<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" />

    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        .sidebar {
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        
        .sidebar-sticky {
            position: -webkit-sticky;
            position: sticky;
            top: 20px;
            height: calc(100vh - 20px);
            padding-right: 10px;
            overflow-x: hidden;
            overflow-y: auto;
        }
    
        .nav-link {
            color: #333;
            font-weight: 500;
        }
    
        .nav-link:hover {
            color: #007bff;
            text-decoration: none;
        }
    
        .nav-link.active {
            color: #007bff;
        }
        .hero-search-results .card {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .item-search-results .card {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .emblem-search-results .card {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .weak-against-card {
            border: 2px solid red;
        }

        .strong-against-card {
            border: 2px solid green;
        }
        .ellipsis-2{
            display: -webkit-box;
            max-width: 400px;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
    
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link{{ Route::is('admin.mlbb.dashboard') ? ' active' : '' }}" href="{{ route('admin.mlbb.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ Route::is('admin.mlbb.heroes.*') ? ' active' : '' }}" href="{{ route('admin.mlbb.heroes.index') }}">Heroes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ Route::is('admin.mlbb.items.*') ? ' active' : '' }}" href="{{ route('admin.mlbb.items.index') }}">Items</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ Route::is('admin.mlbb.emblems.*') ? ' active' : '' }}" href="{{ route('admin.mlbb.emblems.index') }}">Emblems</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ Route::is('admin.mlbb.emblems.*') ? ' active' : '' }}" href="{{ route('logout') }}">Logout</a>
                        </li>
                        
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                @yield('content')
            </main>
        </div>
    </div>


    @yield('scripts')

    
</body>
</html>
