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

    <div class="row">
        <div class="col-md-12">
            <nav class="nav navbar-expand-sm navbar-dark justify-content-end">
                <!-- Navbar Link -->
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('dashboard', ['id' => $id]) }}" class="nav-link menu-top-active">DASHBOARD</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown"> Account</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <a tabindex="-1" class="" href="{{ route('profile', ['id' => $id]) }}">My
                                    Profile</a>
                            </li>
                            <li class="dropdown-item">
                                <a tabindex="-1" class="" href="{{ route('changePassword', ['id' => $id]) }}">Change
                                    Password</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('book-borrowed', ['id' => $id]) }}">Books borrowed</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger" href="{{ route('logout') }}">Log
                            out</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

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
