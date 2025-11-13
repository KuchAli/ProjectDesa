<!-- resources/views/profil/map.blade.php -->
<section id="lokasi" class=" p-4 rounded shadow-sm bg-light">
    <h2 class="fw-bold fs-1 ms-auto mb-3" style="color: #02390e">Lokasi Desa Serang</h2>
    <div id="map-{{ $uniqueId ?? 'default' }}" style="height: 400px; width: 100%;"></div>
</section>

<script>
function initMap{{ $uniqueId ?? 'default' }}() {
    const map = new google.maps.Map(document.getElementById("map-{{ $uniqueId ?? 'default' }}"), {
        center: { lat: -6.2088, lng: 106.8456 }, // Jakarta
        zoom: 12,
    });
    
    // Tambahkan marker jika perlu
    new google.maps.Marker({
        position: { lat: -6.2088, lng: 106.8456 },
        map: map,
        title: "Lokasi Saya"
    });
}
</script>