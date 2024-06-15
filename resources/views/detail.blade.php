<x-guest-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="overflow-x-auto">
            <div class="text-center">
                <img id='barcode' 
                src="https://api.qrserver.com/v1/create-qr-code/?data={{ url('/detail/'.$data[0]->transaction_id) }}" 
                alt="" 
                title="HELLO" 
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
</x-guest-layout>
