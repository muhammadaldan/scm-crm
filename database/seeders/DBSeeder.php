<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;
use App\Models\Petani;
use App\Models\Pedagang;
use App\Models\Industri;
use App\Models\Transaction;

class DBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::truncate();
        Petani::truncate();
        Pedagang::truncate();
        Industri::truncate();
        Transaction::truncate();

        Barang::insert([
            [
                'name' => 'Mangga',
                'type' => 'Buah',
                'created_at' => now(),
            ],
            [
                'name' => 'Anggur',
                'type' => 'Buah',
                'created_at' => now(),
            ],
            [
                'name' => 'Strawberry',
                'type' => 'Buah',
                'created_at' => now(),
            ],
            [
                'name' => 'Wortel',
                'type' => 'Sayuran',
                'created_at' => now(),
            ],
            [
                'name' => 'Tomat',
                'type' => 'Sayuran',
                'created_at' => now(),
            ]
        ]);

        Petani::insert([
            [
                'name' => 'Petani 1',
                'phone_number' => '081234567890',
                'alamat' => 'Jl. Petani 1',
                'created_at' => now(),
            ],
            [
                'name' => 'Petani 2',
                'phone_number' => '081234567891',
                'alamat' => 'Jl. Petani 2',
                'created_at' => now(),
            ],
            [
                'name' => 'Petani 3',
                'phone_number' => '081234567892',
                'alamat' => 'Jl. Petani 3',
                'created_at' => now(),
            ],
        ]);

        Pedagang::insert([
            [
                'name' => 'Pedagang 1',
                'phone_number' => '081234567890',
                'alamat' => 'Jl. Pedagang 1',
                'legalitas_perizinan' => 'PDG-0001',
                'created_at' => now(),
            ],
            [
                'name' => 'Pedagang 2',
                'phone_number' => '081234567891',
                'alamat' => 'Jl. Pedagang 2',
                'legalitas_perizinan' => 'PDG-0002',
                'created_at' => now(),
            ],
            [
                'name' => 'Pedagang 3',
                'phone_number' => '081234567892',
                'alamat' => 'Jl. Pedagang 3',
                'legalitas_perizinan' => 'PDG-0003',
                'created_at' => now(),
            ],
        ]);

        Industri::insert([
            [
                'name' => 'Industri 1',
                'phone_number' => '081234567890',
                'alamat' => 'Jl. Industri 1',
                'legalitas_perizinan' => 'IND-0001',
                'created_at' => now(),
            ],
            [
                'name' => 'Industri 2',
                'phone_number' => '081234567891',
                'alamat' => 'Jl. Industri 2',
                'legalitas_perizinan' => 'IND-0002',
                'created_at' => now(),
            ],
            [
                'name' => 'Industri 3',
                'phone_number' => '081234567892',
                'alamat' => 'Jl. Industri 3',
                'legalitas_perizinan' => 'IND-0003',
                'created_at' => now(),
            ],
        ]);

        Transaction::insert([
            [
                'id' => '9aae64bc-7691-4110-925c-e806f46e2ab1',
                'trasaction_code' => 'TRX-0001',
                'barang_id' => 1,
                'harga' => 50000,
                'type' => 'Jual',
                'jumlah' => 10,
                'satuan' => 'Kg',
                'reference' => 'App\Models\Petani',
                'reference_id' => 1,
                'created_at' => now(),
            ],
            [
                'id' => '9aae64bc-7691-4110-925c-e806f46e2ab2',
                'trasaction_code' => 'TRX-0001',
                'barang_id' => 1,
                'harga' => 50000,
                'type' => 'Beli',
                'jumlah' => 10,
                'satuan' => 'Kg',
                'reference' => 'App\Models\Pedagang',
                'reference_id' => 1,
                'created_at' => now(),
            ],
            [
                'id' => '9aae64bc-7691-4110-925c-e806f46e2ab3',
                'trasaction_code' => 'TRX-0001',
                'barang_id' => 1,
                'harga' => 60000,
                'type' => 'Jual',
                'jumlah' => 10,
                'satuan' => 'Kg',
                'reference' => 'App\Models\Pedagang',
                'reference_id' => 1,
                'created_at' => now(),
            ],
            [
                'id' => '9aae64bc-7691-4110-925c-e806f46e2ab4',
                'trasaction_code' => 'TRX-0001',
                'barang_id' => 1,
                'harga' => 60000,
                'type' => 'Beli',
                'jumlah' => 10,
                'satuan' => 'Kg',
                'reference' => 'App\Models\Pedagang',
                'reference_id' => 2,
                'created_at' => now(),
            ],
            [
                'id' => '9aae64bc-7691-4110-925c-e806f46e2ab5',
                'trasaction_code' => 'TRX-0001',
                'barang_id' => 1,
                'harga' => 65000,
                'type' => 'Jual',
                'jumlah' => 10,
                'satuan' => 'Kg',
                'reference' => 'App\Models\Industri',
                'reference_id' => 1,
                'created_at' => now(),
            ],
            [
                'id' => '9aae64bc-7691-4110-925c-e806f46e2ab6',
                'trasaction_code' => 'TRX-0001',
                'barang_id' => 1,
                'harga' => 65000,
                'type' => 'Beli',
                'jumlah' => 10,
                'satuan' => 'Kg',
                'reference' => 'App\Models\Industri',
                'reference_id' => 1,
                'created_at' => now(),
            ],
        ]);
    }
}
