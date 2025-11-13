<section id="sejarah" class=" p-4 rounded shadow-sm">
    <h2 class="text-center mb-4 section-title">Sejarah Desa Serang</h2>
    
    <div class="card p-4">
        @if(isset($sejarah_konten) && !empty($sejarah_konten))
            <p style="text-align: justify;">{{ $sejarah_konten }}</p>
        @else
            <div class="alert alert-warning text-center">
                <i class="fas fa-book-open"></i> Belum ada sejarah Desa Serang yang tercatat.
            </div>
        @endif
    </div>
</section>