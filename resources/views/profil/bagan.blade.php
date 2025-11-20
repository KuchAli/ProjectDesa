<section id="bagan-desa" class=" p-5 bg-white rounded shadow-sm">
    <h2 class=" mb-4 section-title">Bagan Desa</h2>
    
    <div class="row">
        
        <div class="col-md-6 mb-4">
            <div class="card h-100 text-center border-0">
                <h4 class="card-header bg-light">Struktur Organisasi Pemerintah Desa</h4>
                <div class="card-body d-flex justify-content-center align-items-center">
                    @if(isset($struktur_pemdes))
                        <img src="{{ asset('storage/' . $struktur_pemdes) }}" alt="Struktur Pemdes" class="img-fluid" style="max-height: 400px;">
                    @else
                        <div class="text-muted p-5 border w-100">
                            <i class="fas fa-sitemap fa-3x mb-2"></i>
                            <p>Struktur Organisasi Pemerintah Desa (Gambar)</p>
                            <img src="{{ asset('img/lambang-tasikmalaya.png') }}" alt="Logo Kab. Tasikmalaya" class="mt-3" style="max-width: 100px;">
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card h-100 text-center border-0">
                <h4 class="card-header bg-light">Struktur Organisasi Badan Permusyawaratan Desa</h4>
                <div class="card-body d-flex justify-content-center align-items-center">
                    @if(isset($struktur_bpd))
                        <img src="{{ asset('storage/' . $struktur_bpd) }}" alt="Struktur BPD" class="img-fluid" style="max-height: 400px;">
                    @else
                        <div class="text-muted p-5 border w-100">
                            <i class="fas fa-users fa-3x mb-2"></i>
                            <p>Struktur Organisasi BPD (Gambar)</p>
                            <img src="{{ asset('img/lambang-tasikmalaya.png') }}" alt="Logo Kab. Tasikmalaya" class="mt-3" style="max-width: 100px;">
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</section>