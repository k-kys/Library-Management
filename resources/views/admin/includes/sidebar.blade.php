<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="#" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Brand Logo</span>
    </a>

    <!-- Sidebar -->
    <div
        class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
        <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
        </div>
        <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
        </div>
        <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 609px;"></div>
        {{-- <div class="os-padding"> --}}
        <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
            <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                @if (Auth::guard('admin')->check() == true)
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        @php
                        $currentUser = Auth::guard('admin')->user();
                        @endphp
                        <img src="{{ asset('adminlte-v3/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ $currentUser->name }}</a> &nbsp;
                        <button class="btn btn-xs btn-block btn-secondary">
                            <a href="{{ route('admin.logout') }}" class="dropdown-item">Log out</a>
                        </button>
                    </div>
                    @endif
                </div>
                @php
                $id = Auth::guard('admin')->id();
                @endphp
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent" data-widget="treeview"
                        role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard', ['id' => $id]) }}" class="nav-link ">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-book-reader"></i>
                                <p>
                                    Categories
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.addCategory') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Category</p>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.manageCategory') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Manage Categories</p>

                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-book-reader"></i>
                                <p>
                                    Authors
                                    <i class="right fas fa-angle-left" aria-hidden="true"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.addAuthor') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Author</p>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.manageAuthor') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Manage Authors</p>

                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-book-reader"></i>
                                <p>
                                    Books
                                    <i class="right fas fa-angle-left" aria-hidden="true"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.addBook') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Book</p>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.manageBook') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Manage Books</p>

                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-book-reader"></i>
                                <p>
                                    Books Borrowed
                                    <i class="right fas fa-angle-left" aria-hidden="true"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.addBookLoan') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>New Book Borrow</p>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.manageBookLoan') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Manage Books Borrowed</p>

                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.manageStudent') }}" class="nav-link ">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Students Manager
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.changePassword', ['id' => $id]) }}" class="nav-link ">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Change Password
                                </p>
                            </a>

                        </li>

                    </ul>
                </nav>
            </div>
        </div>
        {{-- </div> --}}
        <!-- /.sidebar-menu -->
        <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="height: 42.8371%; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        <div class="os-scrollbar-corner"></div>
    </div>
    <!-- /.sidebar -->
</aside>
