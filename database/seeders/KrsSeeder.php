<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\Krs;
use App\Models\MataKuliah;

class KrsSeeder extends Seeder
{
    public function run(): void
    {
        $mahasiswas = Mahasiswa::limit(10)->get();

        foreach ($mahasiswas as $mhs) {
            $krs = Krs::firstOrCreate([
                'mahasiswa_id' => $mhs->id,
                'tahun_akademik' => '2026/2027',
                'semester' => 'Ganjil',
            ]);
            $randomMataKuliahIds = MataKuliah::inRandomOrder()->limit(5)->pluck('id');
            $krs->mataKuliah()->sync($randomMataKuliahIds);
        }
    }
}