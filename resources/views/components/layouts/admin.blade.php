<!DOCTYPE html>
<html lang="en">


<!-- index.html    21 Nov 2019 03:44:50 GMT -->
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Otika - Admin Dashboard Template</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('admin/assets/img/favicon.ico') }}" />
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"> <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn"><i data-feather="maximize"></i></a></li>
                        <li>
                            <form class="form-inline mr-auto">
                                <div class="search-element">
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ auth()->user()->getGravatarAttribute() }}" class="user-img-radious-style">
                            <span class="d-sm-none d-lg-inline-block"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">@if (auth()->check()) {{ auth()->user()->name }} @endif</div>
                            <a href="{{ route('admin.users.profile') }}" class="dropdown-item has-icon"><i class="far fa-user"></i> Profile
                            <div class="dropdown-divider"></div>
                            <a href="auth-login.html" class="dropdown-item has-icon text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </nav>

            {{-- Side Bar --}}
            <div class="main-sidebar sidebar-style-2">

                <aside id="sidebar-wrapper">

                    {{-- Logo --}}
                    <div class="sidebar-brand">
                        <a href="{{ route('admin.home') }}"><img alt="image" src="{{ URL::asset('admin/assets/img/logo.png') }}" style="max-height: 75px;" class="mt-2"></a>
                    </div>

                    {{-- Navigation Links --}}
                    <ul class="sidebar-menu">

                        <li class="menu-header mt-3" style="text-align: center;">Admin Panel</li>

                        {{-- Dashboard --}}
                        <li class="dropdown active">
                            <a href="{{ route('admin.home') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
                        </li>

                        {{-- Categories --}}
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown">
                                <i data-feather="list"></i><span>Categories</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('admin.categories.index') }}">Categories</a></li>
                                <li><a class="nav-link" href="{{ route('admin.categories.create') }}">Create Category</a></li>
                            </ul>
                        </li>

                        {{-- Posts --}}
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown">
                                <i data-feather="file-text"></i><span>Posts</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('admin.posts.index') }}">Posts</a></li>
                                <li><a class="nav-link" href="{{ route('admin.posts.create') }}">Create Post</a></li>
                            </ul>
                        </li>

                        {{-- Users --}}
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown">
                                <i data-feather="users"></i><span>Users</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('admin.users.index') }}">Users</a></li>
                            </ul>
                        </li>

                    </ul>

                </aside>

            </div>

            <!-- Main Content -->
            <div class="main-content">
                {{ $slot }}
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    <a href="templateshub.net">Templateshub</a></a>
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('admin/assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('admin/assets/js/page/index.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('admin/assets/js/custom.js') }}"></script>
    <script>CKEDITOR.replace( 'desc' );</script>

    <script>
        const imgInput = document.getElementById('image-upload');
        const previewDiv = document.getElementById('image-preview');
        src = '';

        imgInput.onchange = evt => {
            const [file] = imgInput.files;
            if (file) {
                src = URL.createObjectURL(file);
            }

            previewDiv.style.backgroundImage = `url('${src}')`;
            previewDiv.style.backgroundRepeat = 'no-repeat';
            previewDiv.style.backgroundSize = 'Auto 100%';
        }

    </script>

</body>


<!-- index.html    21 Nov 2019 03:47:04 GMT -->
</html>
