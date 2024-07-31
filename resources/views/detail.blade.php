<x-guest-layout>
    @push('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
    @endpush

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="overflow-x-auto">
            <div id="map" style="height: 400px;width:100%"></div>           
            <div class="text-center mt-4">
                <img id='barcode' 
                src="https://api.qrserver.com/v1/create-qr-code/?data={{ url('/detail/'.$data[0]->transaction_id) }}" 
                alt=""  
                width="200" 
                class="mx-auto"
                height="200" />
            </div>
            <h4 class="text-2xl fw-bold mb-4">Detail Transaksi</h4>
            <p> Nama Barang : {{ $data[0]->barang->name }}</p>
            <p class="mb-4"> Type Barang : {{ $data[0]->barang->type }} </p>
            <table class="table w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2 bg-gray-200">Type</th>
                        <th class="px-4 py-2 bg-gray-200">Identitas</th>
                        <th class="px-4 py-2 bg-gray-200">Harga</th>
                        <th class="px-4 py-2 bg-gray-200">Jumlah</th>
                        <th class="px-4 py-2 bg-gray-200">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td class="border px-4 py-2">{{ $item->type }}</td>
                        <td class="border px-4 py-2">
                            <p>Nama : {{ $item->getReference->name }}</p>
                            <p>Nomor Hp : {{ $item->getReference->phone_number }}</p>
                            <p>Alamat : {{ $item->getReference->alamat }}</p>
                        </td>
                        <td class="border px-4 py-2">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td class="border px-4 py-2">{{ $item->jumlah }} {{ $item->satuan }}</td>
                        <td class="border px-4 py-2">{{ $item->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @push('script')
        <script src="{{ asset('/') }}assets/js/dashboards-analytics.js"></script>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        <script>
            var map = L.map('map').setView([-6.175605, 106.827168], 8);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
                maxZoom: 18,
            }).addTo(map);

            map.on('click', function(e) {
                var lat = e.latlng.lat;
                var lng = e.latlng.lng;
                
                console.log(lat, lng);
            });
            
            var depok = L.marker([-6.413566092994113, 106.78161621093751]).addTo(map)
                .bindPopup("<b>Depok</b><br>Jawa Barat, Indonesia <br/> Tanggal : 2024-06-15 13:02:20", {autoClose: false}).openPopup();
            var bogor = L.marker([-6.664607562172573, 106.82556152343751]).addTo(map)
                .bindPopup("<b>Bogor</b><br>Jawa Barat, Indonesia <br/> Tanggal : 2024-06-15 13:02:20", {autoClose: false}).openPopup();
            var cianjur = L.marker([-6.8555315754820265, 107.17712402343751]).addTo(map)
                .bindPopup("<b>Cianjur</b><br>Jawa Barat, Indonesia <br/> Tanggal : 2024-06-15 13:02:20", {autoClose: false}).openPopup();
            var bandung = L.marker([-6.8555315754820265, 107.17712402343751]).addTo(map)
                .bindPopup("<b>Bandung</b><br>Jawa Barat, Indonesia <br/> Tanggal : 2024-06-15 13:02:20", {autoClose: false}).openPopup();
            var tasikmalaya = L.marker([-7.340674831854912, 108.14941406250001]).addTo(map)
                .bindPopup("<b>Tasikmalaya</b><br>Jawa Barat, Indonesia <br/> Tanggal : 2024-06-15 13:02:20", {autoClose: false}).openPopup();
            var pangandaran = L.marker([-7.781751116696869, 108.44055175781251]).addTo(map)
                .bindPopup("<b>Pangandaran</b><br>Jawa Barat, Indonesia <br/> Tanggal : 2024-06-15 13:02:20", {autoClose: false}).openPopup();

            var line = L.polyline([depok.getLatLng(), bogor.getLatLng(), cianjur.getLatLng(), bandung.getLatLng(), tasikmalaya.getLatLng(), pangandaran.getLatLng()], {color: 'red'}).addTo(map);
            map.invalidateSize();
        </script>
    @endpush
</x-guest-layout>
