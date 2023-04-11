<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home') }}"
            target="_blank">
            <span class="ms-1 font-weight-bold">Library</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'books' ? 'active' : '' }}" href="{{ route('books') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-book-bookmark text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Books</span>
                </a>
            </li>

            @guest
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'login' ? 'active' : '' }}" href="{{ route('login') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-book-bookmark text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Login</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'register' ? 'active' : '' }}" href="{{ route('register') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-book-bookmark text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Register</span>
                    </a>
                </li>
            @endguest

            @auth
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'favorites') == true ? 'active' : '' }}" href="{{ route('favorites') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-favourite-28 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Favorite books</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'reads') == true ? 'active' : '' }}" href="{{ route('reads') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-books text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Read list</span>
                    </a>
                </li>
                <li class="nav-item">
                    <form role="form" method="post" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="nav-link text-white font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="nav-link-text ms-1" style="color:black;">Log out</span>
                        </a>
                    </form>
                </li>
            @endauth

            @admin
                <li>
                    <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                        <i class="fab fa-laravel" ></i>
                        <span class="nav-link-text" >{{ __('Admin section') }}</span>
                        <b class="caret mt-1"></b>
                    </a>

                    <div class="collapse show" id="laravel-examples">
                        <ul class="nav pl-4">
                            <li class="nav-item">
                                <a class="nav-link {{ str_contains(request()->url(), 'admin-book-create') == true ? 'active' : '' }}" href="{{ route('admin-book-create') }}">
                                    <div
                                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="ni ni-tag text-warning text-sm opacity-10"></i>
                                    </div>
                                    <span class="nav-link-text ms-1">New book</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ str_contains(request()->url(), 'admin-books') == true ? 'active' : '' }}" href="{{ route('admin-books') }}">
                                    <div
                                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="ni ni-archive-2 text-warning text-sm opacity-10"></i>
                                    </div>
                                    <span class="nav-link-text ms-1">All books</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ str_contains(request()->url(), 'rent') == true ? 'active' : '' }}" href="{{ route('rents') }}">
                                    <div
                                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="ni ni-badge text-warning text-sm opacity-10"></i>
                                    </div>
                                    <span class="nav-link-text ms-1">Rented books</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endadmin


        </ul>
    </div>
</aside>
