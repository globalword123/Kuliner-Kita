@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-gradient-to-r from-yellow-100 via-yellow-50 to-yellow-200 p-3">
  <div class="card shadow-lg rounded-4 p-5" style="max-width: 500px; width: 100%; background-color: #fffdf7;">
    <h2 class="text-center text-warning fw-bold mb-4">Masuk ke <span class="text-dark">KulinerKita</span></h2>
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="mb-4">
        <label for="email" class="form-label fw-semibold text-dark">Email</label>
        <input id="email" type="email" class="form-control border-warning" name="email" value="{{ old('email') }}" required autofocus placeholder="email@contoh.com">
      </div>
      <div class="mb-4">
        <label for="password" class="form-label fw-semibold text-dark">Kata Sandi</label>
        <input id="password" type="password" class="form-control border-warning" name="password" required placeholder="••••••••">
      </div>
      <div class="mb-4 form-check">
        <input type="checkbox" class="form-check-input" id="remember" name="remember">
        <label class="form-check-label text-dark" for="remember">Ingat saya</label>
      </div>
      <button type="submit" class="btn btn-warning w-100 fw-bold rounded-pill shadow-sm py-3">Masuk</button>
    </form>
    <p class="text-center mt-4 text-secondary">
      Belum punya akun? <a href="{{ route('register') }}" class="text-warning fw-semibold text-decoration-none">Daftar di sini</a>
    </p>
  </div>
</div>
@endsection

@section('styles')
<style>
  body {
    background: linear-gradient(135deg, #fff8dc, #fffde7, #fff9e6); /* very soft yellow */
  }
  .form-control {
    border-width: 2px;
    border-radius: 12px;
    transition: border-color 0.3s ease;
    font-size: 1.1rem;
    padding: 12px 16px;
  }
  .form-control:focus {
    border-color: #ffc107;
    box-shadow: 0 0 8px #ffc107aa;
    outline: none;
  }
  a:hover {
    text-decoration: underline;
  }
  @media (max-width: 576px) {
    .card {
      padding: 2rem 1.5rem;
      margin: 0 1rem;
    }
  }
</style>
@endsection
