<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>{{ config('app.name', 'KulinerKita') }}</title>

<!-- Bootstrap 5 & Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />

<style>
  @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap');

  html, body {
    margin: 0; padding: 0;
    font-family: 'Montserrat', sans-serif;
    background: #f9f8f7;
    color: #222;
  }

  body.dark-mode {
    background: #1c1c1c;
    color: #e4d7c5;
  }

  main.container {
    padding-top: 72px; /* tinggi navbar fixed */
    margin: 1rem auto;
  }

  nav.navbar-elegant {
    background: rgba(34, 34, 34, 0.85);
    backdrop-filter: saturate(180%) blur(12px);
    box-shadow: 0 2px 6px rgb(34 34 34 / 0.4);
    padding: 0.8rem 2rem;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1100;
    transition: background-color 0.4s ease;
  }

  nav.navbar-elegant .navbar-brand {
    font-weight: 600;
    font-size: 1.45rem;
    color: #e4c96a;
    letter-spacing: 0.1rem;
    user-select: none;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  nav.navbar-elegant .navbar-brand img {
    height: 40px;
    object-fit: contain;
  }

  nav.navbar-elegant .nav-link {
    color: #e4d7c5;
    font-weight: 500;
    margin: 0 10px;
    padding: 8px 12px;
    position: relative;
    transition: color 0.3s ease;
  }

  nav.navbar-elegant .nav-link::after {
    content: '';
    position: absolute;
    width: 0%;
    height: 2px;
    bottom: 2px;
    left: 0;
    background: #e4c96a;
    transition: width 0.3s ease;
    border-radius: 2px;
  }

  nav.navbar-elegant .nav-link:hover,
  nav.navbar-elegant .nav-link:focus {
    color: #f9f6e8;
  }
  nav.navbar-elegant .nav-link:hover::after,
  nav.navbar-elegant .nav-link:focus::after {
    width: 100%;
  }

  nav.navbar-elegant .nav-link.active {
    color: #f9f6e8;
    font-weight: 600;
  }
  nav.navbar-elegant .nav-link.active::after {
    width: 100%;
  }

  .navbar-toggler {
    border: none;
    outline: none;
    color: #e4d7c5;
  }
  .navbar-toggler:hover {
    color: #e4c96a;
  }

  .profile-pic {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    border: 2px solid #e4c96a;
    object-fit: cover;
    transition: box-shadow 0.3s ease;
  }
  .profile-pic:hover {
    box-shadow: 0 0 10px 3px #e4c96aaa;
  }

  .dropdown-menu {
    border-radius: 8px;
    border: none;
    box-shadow: 0 8px 25px rgb(0 0 0 / 0.15);
    background: #222222ee;
    backdrop-filter: saturate(180%) blur(10px);
    color: #f9f6e8;
  }

  .dropdown-item {
    color: #f9f6e8;
    font-weight: 500;
    transition: background-color 0.25s ease;
  }
  .dropdown-item:hover, .dropdown-item:focus {
    background-color: #e4c96a22;
    color: #f9f6e8;
  }

  #btnToggleTheme {
    font-size: 1.3rem;
    color: #e4d7c5;
    cursor: pointer;
    user-select: none;
    transition: color 0.3s ease;
  }
  #btnToggleTheme:hover {
    color: #e4c96a;
  }

  @media (max-width: 767px) {
    nav.navbar-elegant {
      padding: 0.5rem 1rem;
    }
    .nav-link {
      margin: 6px 0;
    }
  }

  footer.site-footer {
    width: 100%;
    background: linear-gradient(135deg, #2c3e50, #4ca1af);
    color: white;
    text-align: center;
    padding: 1rem 0;
    margin-top: auto;
    font-weight: 500;
    user-select: none;
  }

</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-elegant">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home') }}">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" />
      KulinerKita
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu"
      aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
      <i class="bi bi-list"></i>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('makanan.index') ? 'active' : '' }}" href="{{ route('makanan.index') }}">Artikel Kuliner</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('makanan.create') ? 'active' : '' }}" href="{{ route('makanan.create') }}">Tambah Artikel</a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('pengaturan') ? 'active' : '' }}" href="{{ route('pengaturan') }}">Pengaturan</a>
        </li>
      </ul>

      <ul class="navbar-nav mb-2 mb-lg-0">
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" id="profileDropdown"
            role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('storage/profile_pictures/profile_' . Auth::id() . '.jpg') }}" alt="Profil" class="profile-pic" />
            {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
            <li><a class="dropdown-item" href="{{ route('profile.show') }}"><i class="bi bi-person me-2"></i>Lihat Profil</a></li>
            <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="bi bi-pencil-square me-2"></i>Edit Profil</a></li>
            <li><hr class="dropdown-divider" /></li>
            <li>
              <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right me-2"></i>Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            </li>
          </ul>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>

<main class="container">
  @yield('content')
</main>

<footer class="footer bg-dark text-light pt-5 pb-4">
  <div class="container">
    <div class="row gy-4">
      <!-- Logo + Tagline -->
      <div class="col-lg-3 col-md-6">
        <a href="{{ route('home') }}" class="d-flex align-items-center mb-3 text-warning text-decoration-none">
          <img src="{{ asset('images/logo.png') }}" alt="KulinerKita Logo" style="height: 40px; object-fit: contain; margin-right: 10px;" />
          <span class="fs-4 fw-bold">KulinerKita</span>
        </a>
        <p class="small fst-italic text-muted">Temukan cita rasa terbaik dari seluruh nusantara.</p>
      </div>

      <!-- Navigasi Cepat -->
      <div class="col-lg-2 col-md-6">
        <h5 class="fw-bold mb-3">Navigasi</h5>
        <ul class="list-unstyled">
          <li><a href="{{ route('home') }}" class="footer-link">Beranda</a></li>
          <li><a href="{{ route('makanan.index') }}" class="footer-link">Artikel Kuliner</a></li>
          {{-- <li><a href="{{ route('makanan.create') }}" class="footer-link">Tambah Artikel</a></li> --}}
          <li><a href="{{ route('pengaturan') }}" class="footer-link">Pengaturan</a></li>
          <li><a href="{{ route('login') }}" class="footer-link">Login</a></li>
        </ul>
      </div>

      <!-- Kontak -->
      <div class="col-lg-3 col-md-6">
        <h5 class="fw-bold mb-3">Kontak Kami</h5>
        <p class="mb-1"><i class="bi bi-geo-alt-fill me-2"></i>Jl. Pegundungan No. 53454, Pejawaran</p>
        <p class="mb-1"><i class="bi bi-envelope-fill me-2"></i>support@kulinerkita.id</p>
        <p><i class="bi bi-telephone-fill me-2"></i>+62 812 2829 1009</p>
      </div>

      <!-- Newsletter -->
      <div class="col-lg-4 col-md-6">
        <h5 class="fw-bold mb-3">Newsletter</h5>
        <p class="small text-muted mb-3">Dapatkan info promo dan artikel terbaru langsung ke email kamu.</p>
        <form class="d-flex" onsubmit="event.preventDefault(); alert('Terima kasih telah berlangganan!');">
          <input type="email" class="form-control me-2" placeholder="Email kamu" required />
          <button type="submit" class="btn btn-warning">Subscribe</button>
        </form>

        <div class="mt-4">
          <a href="#" class="footer-social-link me-3" aria-label="Facebook"><i class="bi bi-facebook fs-4"></i></a>
          <a href="#" class="footer-social-link me-3" aria-label="Twitter"><i class="bi bi-twitter fs-4"></i></a>
          <a href="#" class="footer-social-link me-3" aria-label="Instagram"><i class="bi bi-instagram fs-4"></i></a>
          <a href="#" class="footer-social-link" aria-label="YouTube"><i class="bi bi-youtube fs-4"></i></a>
        </div>
      </div>
    </div>

    <hr class="my-4" style="border-color: #555;" />

    <div class="text-center small text-muted">
      &copy; {{ date('Y') }} KulinerKita. Semua hak cipta dilindungi.
    </div>
  </div>
</footer>

<style>
.footer {
  font-family: 'Montserrat', sans-serif;
  background: #1a1a1a;
  color: #ccc;
  user-select: none;
  border-top-left-radius: 15px;
  border-top-right-radius: 15px;
  box-shadow: inset 0 8px 30px rgb(255 255 255 / 0.05);
  transition: background-color 0.3s ease;
}

.footer-link {
  color: #ccc;
  text-decoration: none;
  display: inline-block;
  margin-bottom: 0.5rem;
  transition: color 0.3s ease;
}

.footer-link:hover,
.footer-link:focus {
  color: #e4c96a;
  text-decoration: underline;
}

.footer-social-link {
  color: #ccc;
  transition: color 0.3s ease, transform 0.3s ease;
}

.footer-social-link:hover,
.footer-social-link:focus {
  color: #e4c96a;
  transform: scale(1.2);
}

.form-control {
  border-radius: 25px;
  border: 1px solid #444;
  background: #ffffff;
  color: #222;
  transition: border-color 0.3s ease;
}

.form-control:focus {
  border-color: #e4c96a;
  box-shadow: 0 0 8px #e4c96aaa;
  background: #ffffff;
  color: #222;
  outline: none;
}

.btn-warning {
  border-radius: 25px;
  font-weight: 600;
  padding-left: 1.5rem;
  padding-right: 1.5rem;
  transition: background-color 0.3s ease;
}

.btn-warning:hover,
.btn-warning:focus {
  background-color: #c9b34b;
  color: #222;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

{{-- Tempat untuk script halaman khusus --}}
@yield('scripts')

{{-- Script tambahan dari halaman lain --}}
@stack('scripts')

</body>
</html>
