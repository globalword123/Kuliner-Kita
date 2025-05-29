{{-- @extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center text-primary mb-5 display-4">Tambah Makanan</h1>

    <div class="card shadow-lg border-0 p-4">
        <form action="{{ route('makanan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Nama Makanan -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Makanan</label>
                <input type="text" name="nama" id="nama" class="form-control shadow-sm" required placeholder="Masukkan Nama Makanan">
            </div>

            <!-- Harga -->
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" id="harga" class="form-control shadow-sm" required placeholder="Masukkan Harga">
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control shadow-sm" rows="4" required placeholder="Masukkan Deskripsi Makanan"></textarea>
            </div>

            <!-- Gambar -->
            <div class="mb-3">
                <label for="gambar" class="form-label">Pilih Foto Makanan</label>
                <input type="file" name="gambar" id="gambar" class="form-control shadow-sm" accept="image/*">
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg shadow-sm w-50">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection --}}
