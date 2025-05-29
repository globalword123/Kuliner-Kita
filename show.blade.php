@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-gradient-to-r from-yellow-100 via-yellow-50 to-yellow-200 p-4">
  <div class="card shadow-lg rounded-4 p-5" style="max-width: 750px; width: 100%; background-color: #fffdf7;">

    <!-- Foto Profil -->
    <div class="text-center mb-4">
      <img
        src="{{ Auth::user()->profile_picture ? Storage::url(Auth::user()->profile_picture) : asset('default-avatar.jpg') }}"
        alt="Foto Profil"
        class="rounded-circle shadow"
        style="width: 180px; height: 180px; object-fit: cover; border: 5px solid #f7d269;">
    </div>

    <!-- Nama dan Email -->
    <h2 class="text-center text-warning fw-bold mb-1">{{ Auth::user()->name }}</h2>
    <p class="text-center text-muted mb-4 fs-5">{{ Auth::user()->email }}</p>

    <!-- Informasi Tambahan -->
    <div class="row justify-content-center text-start mb-4">
      <div class="col-md-6">
        <ul class="list-group list-group-flush fs-5">
          <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-2">
            <span><i class="bi bi-person-fill text-warning me-2"></i>Nama</span>
            <span class="fw-semibold">{{ Auth::user()->name }}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
            <span><i class="bi bi-envelope-fill text-warning me-2"></i>Email</span>
            <span class="fw-semibold">{{ Auth::user()->email }}</span>
          </li>
        </ul>
      </div>
    </div>

    <!-- Tombol Edit -->
    <div class="text-center">
      <a href="{{ route('profile.edit') }}"
         class="btn btn-warning px-5 rounded-pill shadow fw-bold fs-5">
        <i class="bi bi-pencil-square me-2"></i> Edit Profil
      </a>
    </div>

  </div>
</div>
@endsection

@section('styles')
<style>
  body {
    background: linear-gradient(135deg, #fff8dc, #fffde7, #fff9e6);
  }
  .list-group-item {
    background: transparent;
  }
  a.btn-warning {
    box-shadow: 0 4px 8px rgb(255 193 7 / 0.3);
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
  }
  a.btn-warning:hover, a.btn-warning:focus {
    background-color: #e0a800;
    box-shadow: 0 6px 12px rgb(224 168 0 / 0.6);
  }
  @media (max-width: 576px) {
    .card {
      padding: 3rem 2rem;
      margin: 0 1rem;
    }
    .list-group-item {
      font-size: 1.1rem;
    }
  }
</style>
@endsection
