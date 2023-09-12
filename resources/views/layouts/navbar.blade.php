<nav class="navbar navbar-expand-lg shadow bg-white sticky-top">
  <div class="container">
    @guest
      <a class="navbar-brand" href="{{ '/' }}"><img src="{{ asset('logodanteks.png') }}" alt="Logo Sanora" style="width: 100px"></a>
    @else
      @if (Auth::user()->role == 'admin')
        <div class="d-none d-lg-block">
          <a class="navbar-brand" href="{{ '/' }}"><img src="{{ asset('logodanteks.png') }}" alt="Logo Sanora" style="width: 100px"></a>
        </div>
        <div class="d-lg-none d-block">
          <a class="navbar-brand" href="{{ '/' }}"><img src="{{ asset('logodanteks.png') }}" alt="Logo Sanora" style="width: 100px"></a>
          <button type="button" class="btn" data-bs-toggle="offcanvas" data-bs-target="#asider">
            <i class="fa-solid fa-bars-staggered"></i>
          </button>
        </div>
      @else
        <a class="navbar-brand" href="{{ '/' }}"><img src="{{ asset('logodanteks.png') }}" alt="Logo Sanora" style="width: 100px"></a>
      @endif
    @endguest
    
    <div class="" id="navbarSupportedContent">

      <div class="d-flex ms-auto ">
      </div>
      <ul class="navbar-nav ms-lg-2 mb-2 mb-lg-0">
        @guest
          <li class="nav-item mt-2 mt-lg-0">
            <a class="btn btn-outline-info me-2" href="{{ '/login' }}">Masuk</a>
            <a class="btn btn-info text-white" href="{{ '/register' }}">Daftar</a>
          </li>
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="btn btn-info text-white rounded-5 dropdown-toggle d-none d-md-block" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <button class="btn btn-info text-white rounded-5 d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">{{ Auth::user()->name }}</button>

                <div class="dropdown-menu dropdown-menu-end bg-white" aria-labelledby="navbarDropdown">

                    @if (Auth::user()->role == 'author')
                      <a class="dropdown-item" href="{{ '/' }}"><i class="fa-solid fa-house me-2"></i>Beranda</a>
                      <a class="dropdown-item" href="{{ '/infoakun' }}"><i class="fa-regular fa-user me-2"></i>Info Akun</a>
                      <a class="dropdown-item" href="{{ '/karyatulis' }}"><i class="fa-regular fa-pen-to-square me-2"></i>Karya Tulis</a>
                      <a class="dropdown-item" href="{{ '/pengaturan' }}"><i class="fa-solid fa-gear me-2"></i>Pengaturan Akun</a>
                    @elseif (Auth::user()->role == 'admin')
                      <a class="dropdown-item" href="{{ '/' }}"><i class="fa-solid fa-chart-simple me-2"></i>Dashboard</a>
                      <a class="dropdown-item" href="/infoakun_admin"><i class="fa-regular fa-user me-2"></i> Info Akun</a>
                      <a class="dropdown-item" href="{{ '/pengaturan-admin' }}"><i class="fa-solid fa-gear me-2"></i>Pengaturan Akun</a>
                    @endif

                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Keluar
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>

                <div class="offcanvas offcanvas-end d-md-none" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                  <div class="offcanvas-header">
                    <h5 class="offcanvas-title fw-bold" id="offcanvasRightLabel">{{ Auth::user()->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>

                  <div class="row px-5 py-3 text-center">
                    @if (Auth::user()->role == 'author')
                      <a class="text-decoration-none mb-3 text-dark" href="{{ '/' }}"><i class="fa-solid fa-house me-2"></i>Beranda</a>
                      <a class="text-decoration-none mb-3 text-dark" href="{{ '/infoakun' }}"><i class="fa-regular fa-user me-2"></i> Info Akun</a>
                      <a class="text-decoration-none mb-3 text-dark" href="{{ '/karyatulis' }}"><i class="fa-regular fa-pen-to-square me-2"></i>Karya Tulis</a>
                      <a class="text-decoration-none mb-3 text-dark" href="{{ '/pengaturan' }}"><i class="fa-solid fa-gear me-2"></i>Pengaturan Akun</a>
                    @elseif (Auth::user()->role == 'admin')
                      <a class="dropdown-item mb-3" href="{{ '/' }}"><i class="fa-solid fa-chart-simple me-2"></i>Dashboard</a>
                      <a class="dropdown-item mb-3" href="/infoakun_admin"><i class="fa-regular fa-user me-2"></i> Info Akun</a>
                      <a class="dropdown-item mb-3" href="{{ '/pengaturan-admin' }}"><i class="fa-solid fa-gear me-2"></i>Pengaturan Akun</a>
                    @endif
                    <a class="text-decoration-none mb-3 text-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Keluar
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </div>
                </div>
            </li>
        @endguest
      </ul>
    </div>
  {{-- </div> --}}
</nav>

<script src="{{ asset('js/app.js') }}"></script>