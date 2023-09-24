<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Mahasiswa;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct() {
        $this->mahasiswa = new Mahasiswa();
    }

    public function genNim() {
        do {
            $newNim  = date("ym") . rand(0000,9999);
            $dataMhs = $this->mahasiswa->getMahasiswabyNim($newNim);
        } while (isset($dataMhs));

        return $newNim;
    }
}
