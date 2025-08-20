<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       

        DB::table('barangs')->insert([
            [
                'foto_barang' => null,
                'nama_barang' => 'Indomie',
                'harga_beli' => 'Rp 3.500',
                'harga_jual' => 'Rp 4.000',
                'stok' => 50,
            ],
            [
                'foto_barang' => null,
                'nama_barang' => 'Le minerale',
                'harga_beli' => 'Rp 3.000',
                'harga_jual' => 'Rp 3.500',

                'stok' => 40,
            ],
            [
                'foto_barang' => null,
                'nama_barang' => 'Nivea',
                'harga_beli' => 'Rp 35.000',
                'harga_jual' => 'Rp 36.000',

                'stok' => 20,
            ],
        ]);
    }
}
