<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <nav class="nav navbar-expand-sm navbar-dark justify-content-end">
                <!-- Navbar Link -->
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" id="home" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" id="dashboard" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a id="book_borrowed" class="nav-link" href="{{ route('book-borrowed') }}">Books borrowed</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav border-left">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbardrop"
                            data-toggle="dropdown">{{ Auth::guard('students')->user()->name }}</a>
                        <ul class="dropdown-menu" style="margin-left: -55px;">
                            <li class="dropdown-item">
                                <a tabindex="-1" id="my_profile" class="" href="{{ route('profile') }}">My
                                    Profile</a>
                            </li>
                            <li class="dropdown-item">
                                <a tabindex="-1" id="change_password" class=""
                                    href="{{ route('changePassword') }}">Change
                                    Password</a>
                            </li>
                            <li class="dropdown-item">
                                <a class="" href="{{ route('logout') }}">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<br>
