<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index() {
        $data = [
            "title"     => "Master Mahasiswa",
            "i"         => 1,
            "mahasiswa" => $this->mahasiswa->getMahasiswa(),
            "nim"       => $this->genNim()
        ];
        
        return view("mahasiswa.index", $data);
    }
    
    public function store(Request $request) {
        $data = $request->input();
        
        try {
            DB::beginTransaction();
            $this->mahasiswa->insertUpdate($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }

        return redirect()->to(url('/mahasiswa'));
    }

    public function detail($nim) {
        $data = [
            "title" => "Detail Mahasiswa",
            "data"  => $this->mahasiswa->getMahasiswabyNim($nim)
        ];
        
        return view("mahasiswa.detail", $data);
    }
    
    public function edit($nim) {
        $data = [
            "title" => "Edit Mahasiswa",
            "data"  => $this->mahasiswa->getMahasiswabyNim($nim)
        ];
        
        return view("mahasiswa.edit", $data);
    }

    public function update(Request $request, $nim) {
        $data        = $request->input();
        $data["nim"] = $nim;
        
        try {
            $mhs = $this->mahasiswa->getMahasiswabyNim($nim);
            
            DB::beginTransaction();
            $this->mahasiswa->insertUpdate($data, $mhs->id);
            DB::commit();
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
        }

        return redirect()->to(url('/mahasiswa'));
    }

    public function delete(Request $request) {
        $data = $request->input();
        
        try {
            DB::beginTransaction();
            $mhs = $this->mahasiswa->getMahasiswabyNim($data["nim"]);
            $this->mahasiswa->deleteMahasiswa($mhs->id);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }

        return redirect()->to(url('/mahasiswa'));
    }
}
