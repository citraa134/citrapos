<?php

namespace Database\Seeders;

use App\Models\Jenis;
use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis = [
            'Makanan',
            'Minuman',
        ];

        foreach ($jenis as $nama) {
            Jenis::create([
                'nama' => $nama,
            ]);
        }
    }
}