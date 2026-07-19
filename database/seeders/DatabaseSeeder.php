<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// seeders
use Database\Seeders\KriteriaSeeder;
use Database\Seeders\PertanyaanSeeder;



class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(KriteriaSeeder::class);
        $this->call(PertanyaanSeeder::class);
        $this->call(KlasifikasiPenilaianSeeder::class);
        $this->call(UsahaSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(mhsSeeder::class);
        $this->call(HasilKuesionerSeeder::class);
    }
}
