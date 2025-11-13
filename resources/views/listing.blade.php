@extends('layout.app')

@section('title', 'Peta Desa')

@section('content')

<section class="peta-desa py-5 bg-white">
    <div class="container">
        <h3 class="title-desa mb-1">PETA DESA</h3>
        <p class="mb-4">Menampilkan Peta Desa dengan Interest Point Desa Serang</p>
        
        <div class="row mb-4">
            <div class="col-md-4 mb-3 mb-md-0">
                <input type="text" class="form-control" placeholder="Telusuri Peta" id="map-search">
            </div>
            <div class="col-md-3">
                <select class="form-select" id="map-filter">
                    <option selected>Lihat Semua</option>
                    <option value="wisata">Wisata Desa</option>
                    <option value="fasilitas">Fasilitas Umum</option>
                    <option value="bumdes">BUMDes</option>
                    <option value="golongan">Golongan Desa</option>
                </select>
            </div>
            <button class="col-md-1 btn btn-success">Cari</button>
        </div>

        <div id="map-container" class="border border-secondary rounded" style="height: 600px; width: 100%;">
            </div>
        
    </div>
</section>



    <!-- resources/views/map.blade.php -->
    <script>
        const apiKey = '{{ config('services.google_maps.api_key') }}';
        // atau langsung dari controller
        
    </script>

    <!-- Contoh Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&callback=initMap" async defer></script>
    <script>
        let map;

        // Fungsi ini dipanggil setelah Google Maps API dimuat (via callback=initMap)
        function initMap() {
            // Koordinat Desa Serang (Contoh)
            const desaSerang = { lat: -7.345, lng: 108.201 }; 

            map = new google.maps.Map(document.getElementById("map-container"), {
                center: desaSerang,
                zoom: 13,
                mapTypeId: 'roadmap', // Jenis peta (roadmap, satellite, hybrid, terrain)
                // Tambahkan opsi kontrol peta lainnya jika diperlukan
            });

            // Contoh Penambahan Marker (Interest Point)
            const marker = new google.maps.Marker({
                position: desaSerang,
                map: map,
                title: "Pusat Desa Serang",
            });
            
            // Tambahkan logika pencarian dan filter di sini menggunakan data dari backend
            document.getElementById('map-search').addEventListener('keyup', (e) => {
                // Logika filter berdasarkan pencarian
                console.log("Mencari:", e.target.value);
            });

        document.getElementById('map-filter').addEventListener('change', (e) => {
            // Logika filter berdasarkan kategori (Wisata, Fasilitas, dll.)
            console.log("Filter berdasarkan:", e.target.value);
        });
    }

    // Jika Anda menggunakan OpenStreetMap/Leaflet
    /* function initLeafletMap() {
        const desaSerang = [-7.345, 108.201];
        map = L.map('map-container').setView(desaSerang, 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker(desaSerang).addTo(map)
            .bindPopup("Pusat Desa Serang")
            .openPopup();
    }
    document.addEventListener('DOMContentLoaded', initLeafletMap);
    */

</script>
@endsection