<style>
    .section-box {
        background-color: white;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: 2px solid #a8e6cf; /* Garis luar hijau muda */
    }
    .title-text {
        color: #004d40; /* Hijau gelap */
        font-size: 1.8em;
        font-weight: bold;
        text-align: center;
        margin-bottom: 15px;
    }
    .visi-text {
        text-align: center;
        font-size: 1.1em;
        font-weight: 600;
        color: #333;
    }
    .misi-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .misi-item {
        background-color: #f5f5f5; /* Latar belakang abu-abu muda */
        padding: 12px 15px;
        margin-bottom: 8px;
        border-radius: 8px;
        font-size: 1em;
        color: #444;
    }
</style>

{{-- Container Utama --}}
<div style=" padding: 40px;">

    <div class="section-box" style="border-color: #4CAF50;">
        <h2 class="title-text">Visi</h2>
        <p class="visi-text">
            Menjadi perusahaan teknologi terdepan di Asia Tenggara yang menginspirasi dan mendorong kemajuan digital melalui inovasi yang berkelanjutan.
        </p>
    </div>

    <div class="section-box">
        <h2 class="title-text">Misi</h2>
        <ul class="misi-list">
            {{-- Misi ditulis langsung di Blade --}}
            <li class="misi-item">1. Mengembangkan produk dan solusi teknologi yang inovatif, mudah diakses, dan memberikan nilai tambah nyata bagi pengguna.</li>
            <li class="misi-item">2. Membangun talenta digital yang unggul dan lingkungan kerja yang kolaboratif serta berorientasi pada hasil.</li>
            <li class="misi-item">3. Memperluas jangkauan pasar secara regional dan global dengan menjaga kualitas layanan pelanggan yang prima.</li>
            <li class="misi-item">4. Berkontribusi aktif dalam menciptakan ekosistem digital yang sehat dan mendukung pembangunan berkelanjutan.</li>
            <li class="misi-item">5. Menerapkan tata kelola perusahaan yang baik (Good Corporate Governance) untuk pertumbuhan bisnis yang etis dan stabil.</li>
        </ul>
    </div>

</div>