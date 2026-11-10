<?php

namespace Database\Seeders;

use App\Models\MataKuliah;
use Illuminate\Database\Seeder;

class MataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        $daftar = [
            ['T1101', 'Pengantar Teknologi Informasi', 2],
            ['T1102', 'Algoritma dan Pemrograman', 3],
            ['T1103', 'Matematika Diskrit', 3],
            ['T1201', 'Basis Data', 3],
            ['T1202', 'Desain Web', 3],
            ['T1203', 'Pemrograman Web', 3],
            ['T1204', 'Jaringan Komputer', 3],
            ['T1301', 'Rekayasa Perangkat Lunak', 3],
            ['T1302', 'Pemrograman Berorientasi Objek', 3],
            ['T1303', 'Sistem Operasi', 2],
        ];

        foreach ($daftar as [$kode, $nama, $sks]) {
            MataKuliah::updateOrCreate(
                ['kode_mk' => $kode],
                ['nama_mk' => $nama, 'sks' => $sks]
            );
        }
    }
}