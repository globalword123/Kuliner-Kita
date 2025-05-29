@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold text-warning">⚙️ Pengaturan Website</h1>
        <p class="text-muted">Atur preferensi dan tampilan sesuai keinginan Anda.</p>
    </div>

    <div class="row g-4">
        <!-- Mode Tampilan -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="text-secondary mb-1">Mode Tampilan</h5>
                        <small class="text-muted">Ubah antara siang dan malam</small>
                    </div>
                    <button id="themeToggle" class="btn btn-outline-dark rounded-pill px-4">
                        <i class="bi bi-moon-stars-fill me-2"></i><span>Mode Malam</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Nama Aplikasi -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body">
                    <h5 class="text-secondary mb-3">Nama Aplikasi</h5>
                    <form id="appNameForm" class="row g-3 align-items-end">
                        <div class="col-8">
                            <label for="appName" class="form-label">Nama Baru</label>
                            <input type="text" id="appName" class="form-control" placeholder="Contoh: Kuliner Nusantara">
                        </div>
                        <div class="col-4">
                            <button class="btn btn-warning w-100 rounded-pill" type="submit">
                                <i class="bi bi-save me-1"></i> Simpan
                            </button>
                        </div>
                    </form>
                    <div class="alert alert-light border mt-4 mb-0" id="appNamePreview">
                        <i class="bi bi-info-circle me-2 text-primary"></i>
                        Nama Saat Ini: <strong><span id="currentAppName">Kuliner Nusantara</span></strong>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tentang Kami -->
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <h3 class="mb-3 text-warning">Tentang Kami</h3>
                <p>Kuliner Nusantara adalah platform online yang berfokus pada eksplorasi dan pelestarian kekayaan kuliner Indonesia. Kami menyediakan informasi lengkap tentang berbagai makanan khas dari seluruh penjuru negeri, mulai dari resep, sejarah, hingga rekomendasi tempat makan.</p>

                <h5 class="mt-4">Visi Kami</h5>
                <p>Menjadi pusat referensi kuliner terpercaya yang menghubungkan pecinta makanan dan budaya kuliner Indonesia di seluruh dunia.</p>

                <h5 class="mt-4">Misi Kami</h5>
                <ul>
                    <li>Menyajikan konten kuliner yang akurat, menarik, dan mudah diakses.</li>
                    <li>Mendukung pelaku usaha kuliner lokal dengan mempromosikan produk dan cerita mereka.</li>
                    <li>Membangun komunitas yang saling berbagi pengetahuan dan pengalaman kuliner.</li>
                    <li>Melestarikan tradisi kuliner Indonesia agar tidak terlupakan oleh generasi mendatang.</li>
                </ul>

                <h5 class="mt-4">Tim Kami</h5>
                <p>Kami terdiri dari para penggemar kuliner, penulis, dan pengembang teknologi yang bersemangat untuk mengangkat kekayaan rasa dan budaya Indonesia ke tingkat yang lebih tinggi.</p>

                <h5 class="mt-4">Kontak</h5>
                <p>Jika Anda memiliki pertanyaan, saran, atau ingin berkolaborasi, silakan hubungi kami melalui:</p>
                <ul>
                    <li>Email: <a href="mailto:info@kulinernusantara.id">info@kulinernusantara.id</a></li>
                    <li>Telepon: +62 812 2829 1009</li>
                    <li>Alamat: Jl. Pegundungan No. 53454, Pejawaran, Banjarnegara</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Toast -->
<div id="toastContainer" class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="toastNotif" class="toast align-items-center text-bg-success border-0 shadow" role="alert">
        <div class="d-flex">
            <div class="toast-body" id="toastMessage">Perubahan disimpan!</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .dark-mode {
        background-color: #121212 !important;
        color: #f1f1f1;
    }
    .dark-mode .card {
        background-color: #1e1e1e;
        color: #f1f1f1;
    }
    .dark-mode .form-control,
    .dark-mode .alert {
        background-color: #2c2c2c;
        color: #f1f1f1;
        border-color: #444;
    }
    .dark-mode .btn-outline-dark {
        color: #fff;
        border-color: #f1f1f1;
    }
    .dark-mode .btn-outline-dark:hover {
        background-color: #f1f1f1;
        color: #121212;
    }
    .btn-warning:hover {
        background-color: #e0b800;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const themeToggle = document.getElementById('themeToggle');
        const appNameForm = document.getElementById('appNameForm');
        const appNameInput = document.getElementById('appName');
        const currentAppName = document.getElementById('currentAppName');

        // Load theme from localStorage
        const savedTheme = localStorage.getItem('theme') || 'light';
        applyTheme(savedTheme);

        themeToggle.addEventListener('click', () => {
            const isDark = document.body.classList.toggle('dark-mode');
            const theme = isDark ? 'dark' : 'light';
            localStorage.setItem('theme', theme);
            applyTheme(theme);
            showToast(`Tema diubah ke ${theme === 'dark' ? 'Malam' : 'Siang'}`);
        });

        function applyTheme(theme) {
            const isDark = theme === 'dark';
            document.body.classList.toggle('dark-mode', isDark);
            themeToggle.querySelector('i').className = isDark ? 'bi bi-sun-fill me-2' : 'bi bi-moon-stars-fill me-2';
            themeToggle.querySelector('span').textContent = isDark ? 'Mode Siang' : 'Mode Malam';
        }

        // Load app name from localStorage
        if (localStorage.getItem('appName')) {
            const saved = localStorage.getItem('appName');
            appNameInput.value = saved;
            currentAppName.textContent = saved;
        }

        appNameForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const name = appNameInput.value.trim();
            if (name) {
                localStorage.setItem('appName', name);
                currentAppName.textContent = name;
                showToast('Nama aplikasi telah diperbarui!');
            } else {
                showToast('Nama aplikasi tidak boleh kosong!');
            }
        });

        function showToast(message) {
            const toastMsg = document.getElementById('toastMessage');
            toastMsg.textContent = message;
            const toast = new bootstrap.Toast(document.getElementById('toastNotif'));
            toast.show();
        }
    });
</script>
@endpush
