<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-md">
                <!-- brand -->
                <a class="navbar-brand" href="#">
                    <img src="{{ url('/logo-hpc-9-3-1.png') }}" alt="">
                </a>
            </nav>
        </div>
    </div>
    <!-- LOGO HEADER END-->


    <!-- Navbar -->
    @if (Auth::guard('students')->check() == true)

    @php
    $id = Auth::guard('students')->id();
    @endphp
    @if (DB::table('students')->select('status')->where('id', $id)->first()->status == 1)


    <div class="row">
        <div class="col-md-12">
            <nav class="nav navbar-expand-sm navbar-dark justify-content-end">
                <!-- Navbar Link -->
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link menu-top-active">DASHBOARD</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown"> Account</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <a tabindex="-1" class="" href="{{ route('profile') }}">My
                                    Profile</a>
                            </li>
                            <li class="dropdown-item">
                                <a tabindex="-1" class="" href="{{ route('changePassword') }}">Change
                                    Password</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('book-borrowed') }}">Books borrowed</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav border-left">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbardrop"
                            data-toggle="dropdown">{{ Auth::guard('students')->user()->name }}</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    @endif
    @else

    <div class="row">
        <div class="col-md-12">
            <nav class="nav navbar-expand-sm navbar-dark justify-content-end">
                <!-- Navbar link -->
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.getLogin') }}">Admin Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Student Form</a></li>
                </ul>
            </nav><!-- /.navbar-collapse -->
        </div>
    </div>

    @endif
</div>
<br>
