<aside class="main-sidebar sidebar-dark-orange elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="#" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Online Library Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
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
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a id="dashboard_link" href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li id="categories" class="nav-item has-treeview">
                    <a id="categories_link" href="#" class="nav-link">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>
                            Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a id="add_category_link" href="{{ route('admin.addCategory') }}" class="nav-link">
                                <i id="add_category_icon" class="far fa-circle nav-icon"></i>
                                <p>Add Category</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="manage_category_link" href="{{ route('admin.manageCategory') }}" class="nav-link">
                                <i id="manage_category_icon" class="far fa-circle nav-icon"></i>
                                <p>Manage Categories</p>

                            </a>
                        </li>
                    </ul>
                </li>
                <li id="authors" class="nav-item has-treeview">
                    <a id="authors_link" href="#" class="nav-link ">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>
                            Authors
                            <i class="right fas fa-angle-left" aria-hidden="true"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a id="add_author_link" href="{{ route('admin.addAuthor') }}" class="nav-link">
                                <i id="add_author_icon" class="far fa-circle nav-icon"></i>
                                <p>Add Author</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="manage_author_link" href="{{ route('admin.manageAuthor') }}" class="nav-link">
                                <i id="manage_author_icon" class="far fa-circle nav-icon"></i>
                                <p>Manage Authors</p>

                            </a>
                        </li>
                    </ul>
                </li>
                <li id="books" class="nav-item has-treeview">
                    <a id="books_link" href="#" class="nav-link ">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>
                            Books
                            <i class="right fas fa-angle-left" aria-hidden="true"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a id="add_book_link" href="{{ route('admin.addBook') }}" class="nav-link">
                                <i id="add_book_icon" class="far fa-circle nav-icon"></i>
                                <p>Add Book</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="manage_book_link" href="{{ route('admin.manageBook') }}" class="nav-link">
                                <i id="manage_book_icon" class="far fa-circle nav-icon"></i>
                                <p>Manage Books</p>

                            </a>
                        </li>
                    </ul>
                </li>
                <li id="books_borrowed" class="nav-item has-treeview">
                    <a id="books_borrowed_link" href="#" class="nav-link ">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>
                            Books Borrowed
                            <i class="right fas fa-angle-left" aria-hidden="true"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a id="add_borrowed_link" href="{{ route('admin.addBookLoan') }}" class="nav-link">
                                <i id="add_borrowed_icon" class="far fa-circle nav-icon"></i>
                                <p>New Book Borrow</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="manage_borrowed_link" href="{{ route('admin.manageBookLoan') }}" class="nav-link">
                                <i id="manage_borrowed_icon" class="far fa-circle nav-icon"></i>
                                <p>Manage Books Borrowed</p>

                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a id="students_link" href="{{ route('admin.manageStudent') }}" class="nav-link ">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Students Manager
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a id="change_password_link" href="{{ route('admin.changePassword') }}" class="nav-link ">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Change Password
                        </p>
                    </a>

                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>