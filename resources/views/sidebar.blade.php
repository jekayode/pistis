<div class="col-xl-2 col-lg-3 col-md-12 col-sm-12 col-12">
    <nav class="navbar navbar-expand-lg db-sidenav">
        <div class="offcanvas-collapse" id="db-sidenav">
                    <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="{{ url('/home') }}"><i class="fas fa-fw fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('phones') ? 'active' : '' }} " href="{{ url('/phones') }}"><i class="fas fa-fw fa-list"></i>Phone Numbers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('upload') ? 'active' : '' }}" href="{{ url('/upload') }}"><i class="fas fa-fw fa-receipt"></i>Upload Numbers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('send') ? 'active' : '' }}" href="{{ url('/send') }}"><i class="fas fa-fw fa-star"></i>Send SMS</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"> <i class="fas fa-fw fa-sign-out-alt"></i>
                            {{ __('Logout') }}
                        </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</div>
