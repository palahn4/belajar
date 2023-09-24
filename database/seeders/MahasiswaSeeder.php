<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswa = new Mahasiswa();
        $faker     = \Faker\Factory::create('id_ID');
        for ($i=0; $i < 100; $i++) { 
            $data = [
                "nim"       => date("ym") . rand(0000,9999),
                "name"      => $faker->name,
                "gender"    => $faker->randomElement(["L","P"]),
                "religion"  => $faker->randomElement(["Islam","Katolik","Protestan","Hindu","Budha","Kong Hu Chu"]),
                "address"   => $faker->address,
                "phone"     => $faker->phoneNumber
            ];
            
            $mahasiswa->insertUpdate($data);
        }
    }
}
