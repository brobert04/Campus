<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <div class="dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false" id="dropdownMenu2">
                    <div class="user-panel">
                        <div class="image">
                            <img
                                src="{{ (!empty(Auth::user()->image)) ? url('upload/user_images/' .Auth::user()->image) : 'https://ui-avatars.com/api/?background=random&name='.Auth::user()->name }}" class="img-fluid img-circle"
                            >
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <h6 class="dropdown-header">{{Auth::user()->name}} | {{Auth::user()->role}}</h6>
                    <button class="dropdown-item" type="button"><a href="{{route('profile.index')}}" class="text-dark">Profile</a></button>
                    <button class="dropdown-item" type="button"><a href="{{route('profile.settings')}}" class="text-dark">Settings</a></button>
                    <div class="dropdown-divider"></div>
                    <button class="dropdown-item" type="button"><a href="{{route('admin.logout')}}" class="text-dark">Logout</a></button>
                </div>
            </div>
        </li>
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>

{{--{{asset('storage/profile-photos/users/' . str_replace(" ", '', Auth::user()->name) . '.png')}}--}}
