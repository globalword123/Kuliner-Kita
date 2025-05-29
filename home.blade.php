@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">

  <!-- Hero Section -->
  <section class="bg-gradient-to-r from-yellow-100 via-yellow-50 to-yellow-200 py-5">
    <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
      <div class="text-center text-md-start mb-4 mb-md-0 animate__animated animate__fadeInLeft">
        <h1 class="display-4 fw-bold text-warning mb-3">Selamat Datang di <span class="text-dark">KulinerKita</span></h1>
        <h3 class="typed-text text-muted fst-italic mb-3" style="min-height: 38px;"></h3>
        <p class="lead text-secondary">Solusi lengkap untuk pengelolaan bisnis kuliner dengan cepat dan mudah.</p>
        <a href="{{ route('makanan.index') }}" class="btn btn-warning btn-lg rounded-pill shadow">Memahami Ragam Menu</a>
      </div>
      <div class="text-center animate__animated animate__fadeInRight">
        <img src="{{ asset('images/hero-kuliner.png') }}" alt="Hero Kuliner" class="img-fluid rounded-circle shadow-lg" style="max-height: 350px;">
      </div>
    </div>
  </section>

  <!-- Scroll Down Indicator -->
  <div class="text-center mt-3 mb-5">
    <i class="bi bi-arrow-down-circle-fill text-warning fs-1 animate__animated animate__bounce animate__infinite"></i>
  </div>

  <!-- Features Section -->
  <section class="container py-5">
    <div class="row g-4 text-center">
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
        <div class="card shadow-sm rounded-4 border-0 hover-shadow py-4">
          <i class="bi bi-journal-check text-warning fs-1 mb-3"></i>
          <h5 class="fw-semibold mb-2">Kelola Menu Mudah</h5>
          <p class="text-muted"> Memiliki interface sederhana dan cepat.</p>
          <a href="{{ route('makanan.index') }}" class="btn btn-outline-warning btn-sm rounded-pill px-4">Lihat Artikel</a>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
        <div class="card shadow-sm rounded-4 border-0 hover-shadow py-4">
          <i class="bi bi-moon-stars-fill text-warning fs-1 mb-3"></i>
          <h5 class="fw-semibold mb-2">Mode Gelap</h5>
          <p class="text-muted">Ubah tampilan agar lebih nyaman di mata dengan satu klik tombol.</p>
          <button onclick="toggleTheme()" class="btn btn-outline-warning btn-sm rounded-pill px-4">Ganti Tema</button>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="500">
        <div class="card shadow-sm rounded-4 border-0 hover-shadow py-4">
          <i class="bi bi-gear-fill text-warning fs-1 mb-3"></i>
          <h5 class="fw-semibold mb-2">Pengaturan Lengkap</h5>
          <p class="text-muted">Personalisasi fitur dan preferensi sesuai kebutuhan bisnis kulinermu.</p>
          <a href="{{ route('pengaturan') }}" class="btn btn-outline-warning btn-sm rounded-pill px-4">Atur Sekarang</a>
        </div>
      </div>
    </div>
  </section>

  <!-- About Us Section -->
  <section class="bg-warning text-white py-5 text-center" data-aos="fade-right">
    <div class="container">
      <h2 class="fw-bold mb-4">Kenapa KulinerKita?</h2>
      <p class="lead mb-5">Kami menyediakan solusi lengkap dan mudah untuk membantu bisnis kuliner kamu berkembang lebih cepat dan efisien.</p>
      <div class="row justify-content-center">
        <div class="col-md-5 mb-3" data-aos="flip-left" data-aos-delay="200">
          <div class="bg-white text-warning rounded-4 p-4 shadow-sm">
            <i class="bi bi-lightning-charge-fill fs-2 mb-3"></i>
            <h5 class="fw-semibold mb-2">Cepat & Responsif</h5>
            <p class="mb-0">Platform kami dioptimalkan untuk kecepatan dan kemudahan akses kapan saja, di mana saja.</p>
          </div>
        </div>
        <div class="col-md-5 mb-3" data-aos="flip-left" data-aos-delay="400">
          <div class="bg-white text-warning rounded-4 p-4 shadow-sm">
            <i class="bi bi-people-fill fs-2 mb-3"></i>
            <h5 class="fw-semibold mb-2">Mudah Digunakan</h5>
            <p class="mb-0">User-friendly dengan antarmuka yang bersahabat untuk semua kalangan pengguna.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="container py-5" data-aos="fade-up">
    <h2 class="text-center fw-bold mb-5">Pertanyaan yang Sering Diajukan</h2>
    <div class="accordion" id="faqAccordion">
      <div class="accordion-item">
        <h2 class="accordion-header" id="faq1">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
            Apakah website ini gratis?
          </button>
        </h2>
        <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="faq1" data-bs-parent="#faqAccordion">
          <div class="accordion-body">Ya, kamu bisa menggunakan website ini secara gratis.</div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="faq2">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
            Apakah bisa diakses lewat HP?
          </button>
        </h2>
        <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#faqAccordion">
          <div class="accordion-body">Saat ini belum bisa diakses lewat HP, tapi sedang dalam pengembangan.</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call To Action Section with Confetti -->
  <section class="bg-warning text-white text-center py-5">
    <h2 class="display-5 fw-bold mb-3">Gabung dengan KulinerKita Sekarang!</h2>
    <p class="lead mb-4">Dapatkan kemudahan dalam mengelola bisnis kuliner Anda dengan teknologi terbaik.</p>
    <button id="btnDaftar" class="btn btn-light btn-lg rounded-pill px-5 shadow animate__animated animate__pulse animate__infinite">
      Daftar Sekarang
    </button>
  </section>

  <!-- Back to Top -->
  <button id="btnBackToTop" class="btn btn-warning rounded-circle shadow position-fixed" style="bottom: 40px; right: 40px; display: none; z-index: 1000;">
    <i class="bi bi-arrow-up fs-5"></i>
  </button>

</div>
@endsection

@section('styles')
<style>
  .hover-shadow:hover {
    box-shadow: 0 0 15px rgba(255, 193, 7, 0.7);
    transition: box-shadow 0.3s ease;
  }
  .footer-link {
    color: #ffc107;
    transition: color 0.3s ease;
  }
  .footer-link:hover {
    color: #fff;
    text-decoration: underline;
  }
  #btnBackToTop {
    opacity: 0;
    transition: opacity 0.3s ease;
  }
  #btnBackToTop.show {
    opacity: 1;
    display: block !important;
  }
  body.dark-mode {
    background-color: #121212;
    color: #eee;
  }
  body.dark-mode .bg-warning {
    background-color: #ffb300 !important;
  }
  body.dark-mode footer {
    background-color: #222 !important;
  }
  body.dark-mode .card {
    background-color: #1e1e1e;
    border-color: #444;
  }
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    new Typed('.typed-text', {
      strings: ['Mudah', 'Cepat', 'Efisien', 'Modern', 'Terpercaya'],
      typeSpeed: 80,
      backSpeed: 50,
      backDelay: 1800,
      loop: true,
      showCursor: true,
      cursorChar: '|',
    });

    AOS.init();

    window.toggleTheme = function() {
      document.body.classList.toggle('dark-mode');
      if (document.body.classList.contains('dark-mode')) {
        localStorage.setItem('theme', 'dark');
      } else {
        localStorage.setItem('theme', 'light');
      }
    };

    if (localStorage.getItem('theme') === 'dark') {
      document.body.classList.add('dark-mode');
    }

    const btnBackToTop = document.getElementById('btnBackToTop');
    window.addEventListener('scroll', () => {
      if (window.pageYOffset > 300) {
        btnBackToTop.classList.add('show');
      } else {
        btnBackToTop.classList.remove('show');
      }
    });
    btnBackToTop.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    const btnDaftar = document.getElementById('btnDaftar');
    if (btnDaftar) {
      btnDaftar.addEventListener('click', () => {
        confetti({
          particleCount: 150,
          spread: 70,
          origin: { y: 0.6 },
          colors: ['#ffc107', '#ff5722', '#4caf50', '#2196f3', '#e91e63']
        });
        alert('Terima kasih sudah mendaftar! Kami akan menghubungi Anda segera.');
      });
    }
  });
</script>
@endsection
