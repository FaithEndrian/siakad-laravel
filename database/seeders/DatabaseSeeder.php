<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            DosenSeeder::class,
            MahasiswaSeeder::class,
            MataKuliahSeeder::class,
            UserSeeder::class,
            KrsSeeder::class,

        ]);
    }
}
