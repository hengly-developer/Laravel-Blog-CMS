<div class="card">
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="https://bulma.io">
                <img src="{{asset('images/logo.jpg')}}">
                </a>
            </div>
            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item">Learn</a>
                    <a class="navbar-item">Discuss</a>
                    <a class="navbar-item">Share</a>
                </div>
                <div class="navbar-end">
                    <div class="navbar-item">
                        @guest
                            <a href="{{route('login')}}" class="navbar-item">Login</a>
                            <a href="{{route('register')}}" class="navbar-item">Join The Community</a>
                        @else
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link">Hi, {{ Auth::user()->name }}</a>
                                <div class="navbar-dropdown">
                                    <a class="navbar-item" href="#"><span class="icon"> <i class="fa fa-fw fa-user-circle-o m-r-5"></i></span>Profile</a>
                                    <a class="navbar-item" href="#"><span class="icon"><i class="fa fa-fw fa-bell m-r-5"></i></span>Notifications</a>
                                    <a class="navbar-item" href="{{route('manage.dashboard')}}"><span class="icon"><i class="fa fa-fw fa-cog m-r-5"></i></span>Manage</a>
                                    <hr class="navbar-divider">
                                    <a class="navbar-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <span class="icon"><i class="fa fa-fw fa-sign-out m-r-5"></i></span>Logout</a>
                                    @include('_includes.forms.logout')
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
