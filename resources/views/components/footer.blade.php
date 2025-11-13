<footer class="text-white pt-5 pb-3" style="background-color: #02390e; margin: 0; padding: 0; width: 100%;">
    <div class="container-fluid px-5" style="margin: 0; padding: 0; width: 100%;">
        <div class="row g-0"> <!-- Tambahkan g-0 untuk hilangkan gutter -->
            <div class="col-md-6 mb-4">
                <img src="https://cdn.digitaldesa.com/uploads/profil/32.06.14.2002/common/300_tasikmalaya.png" 
                alt="logo pemerintah" class="float-start me-3" style="width: 75px">
                <h5 class="text-desa">Pemerintah Desa Serang</h5>
                <p class="small mb-0"> <!-- Tambahkan mb-0 -->
                    [Alamat Kantor] <br>
                    Desa Serang, Kecamatan Salawu, Kabupaten Tasikmalaya...<br>
                    Provinsi Jawa Barat, 46472
                </p>
            </div>
            
            <div class="col-md-3 mb-4">
                <h5 class="text-light">Hubungi Kami</h5>
                <p class="small mt-3 fw-bold mb-2"> <!-- Tambahkan mb-2 -->
                    <img src="{{ asset('images/phone-call.png') }}" alt="" style="width:30px" class="float-start me-3">
                    0895384154980
                </p>
                <p class="small mb-0"> <!-- Tambahkan mb-0 -->
                    <img src="{{ asset('images/mail.png') }}" alt="" style="width:30px" class="float-start me-3">
                    XXXXX@gmail.com
                </p>
            </div>
            
            <div class="col-md-3 mb-4">
                <h5 class="text-desa">Tautan Cepat</h5>
                <ul class="list-unstyled small mb-0"> <!-- Tambahkan mb-0 -->
                    <li class="mb-1"><a href="/panduan" class="text-white text-decoration-none">Panduan</a></li>
                    <li class="mb-0"><a href="/faq" class="text-white text-decoration-none">FAQ</a></li>
                </ul>
            </div>
        </div>
        
        <hr class="bg-secondary my-3"> <!-- Tambahkan my-3 untuk kontrol margin -->
        <div class="text-center small pt-2 pb-0"> <!-- Ganti pt-2 dan tambah pb-0 -->
            &copy; {{ date('Y') }} Powered by PT Digital Desa Indonesia
        </div>
    </div>
</footer>