@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-gradient-to-r from-yellow-100 via-yellow-50 to-yellow-200 p-4">
  <div class="card shadow-lg rounded-4 p-5" style="max-width: 750px; width: 100%; background-color: #fffdf7;">
    <h2 class="text-center text-warning fw-bold mb-5">Edit <span class="text-dark">Profil</span></h2>

    @php
        $foto = $user->profile_picture
            ? Storage::url($user->profile_picture)
            : asset('default-avatar.jpg');
    @endphp
    <div class="text-center mb-5">
      <img src="{{ $foto }}"
           alt="Foto Profil"
           class="rounded-circle shadow"
           style="width: 180px; height: 180px; object-fit: cover; border: 3px solid #e4c96a;">
    </div>

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="text-start">
      @csrf

      <div class="mb-5">
        <label for="name" class="form-label fw-semibold text-dark fs-5">Nama</label>
        <input id="name" type="text" name="name"
               class="form-control border-warning fs-5 @error('name') is-invalid @enderror"
               value="{{ old('name', $user->name) }}" required autofocus placeholder="Nama lengkap">
        @error('name')
          <div class="invalid-feedback fs-6">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-5">
        <label for="profile_picture" class="form-label fw-semibold text-dark fs-5">Ganti Foto Profil</label>
        <input id="profile_picture" type="file" name="profile_picture"
               class="form-control border-warning fs-5 @error('profile_picture') is-invalid @enderror" accept="image/*">
        @error('profile_picture')
          <div class="invalid-feedback fs-6">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-warning w-100 fw-bold rounded-pill shadow-sm py-3 fs-5">
        <i class="bi bi-save me-2"></i> Simpan Perubahan
      </button>
    </form>
  </div>
</div>
@endsection

@section('styles')
<style>
  body {
    background: linear-gradient(135deg, #fff8dc, #fffde7, #fff9e6);
  }
  .form-control {
    border-width: 2px;
    border-radius: 12px;
    transition: border-color 0.3s ease;
    font-size: 1.25rem;
    padding: 14px 18px;
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
      padding: 2.5rem 1.5rem;
      margin: 0 1rem;
    }
    .form-control {
      font-size: 1.1rem;
      padding: 12px 14px;
    }
  }
</style>
@endsection
