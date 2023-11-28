<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">{{Auth::user()->name}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ $page == 'home' ? 'active' : '' }}"
                        {{ $page == 'home' ? 'aria-current="page"' : '' }}
                        href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $page == 'soal' ? 'active' : '' }}"
                        {{ $page == 'soal' ? 'aria-current="page"' : '' }}
                        href="/soal">Soal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $page == 'materi' ? 'active' : '' }}"
                        {{ $page == 'materi' ? 'aria-current="page"' : '' }}
                        href="/materi">Materi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $page == 'userdata' ? 'active' : '' }}"
                        {{ $page == 'userdata' ? 'aria-current="page"' : '' }}
                        href="/userdata">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    {{-- <a class="nav-link" href="/materi">Logout</a> --}}
                </li>
            </ul>
            {{-- <ul class="d-flex">
                <li class="nav-item">
                    <a class="nav-link" href="/soal">Logout</a>
                </li> --}}
            {{-- </ul> --}}
            {{-- <form class="d-flex" >
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" >
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
        </div>
    </div>
</nav>
