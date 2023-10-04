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
            $newNim      = "";
            do {
                $newNim  = date("ym") . substr(str_shuffle("0123456789"), 0, 4);
                $dataMhs = $mahasiswa->getMahasiswabyNim($newNim);
            } while (isset($dataMhs));

            $gender = $faker->randomElement(["male","female"]);
            $data   = [
                "nim"       => $newNim,
                "name"      => $faker->name($gender),
                "gender"    => ($gender == "male") ? "L" : "P",
                "religion"  => $faker->randomElement(["Islam","Katolik","Protestan","Hindu","Budha","Kong Hu Chu"]),
                "address"   => $faker->address,
                "phone"     => $faker->phoneNumber
            ];
            
            $mahasiswa->insertUpdate($data);
        }
    }
}
