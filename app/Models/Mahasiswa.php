<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table    = "mahasiswa";
    protected $fillable = ["nim", "name", "gender", "religion", "address", "phone"];
    protected $hidden   = ["id"];

    public $timestamps  = true;

    public function getMahasiswa() {
        return $this->get();
    }

    public function getMahasiswabyId($id) {
        return $this->find($id);
    }
    
    public function getMahasiswabyNim($nim) {
        return $this->where("nim", $nim)->first();
    }

    public function getLastNim() {
        return $this->select("nim")->orderBy("desc")->first();
    }

    public function insertUpdate($data, $id = null) {
        $save           = $this->firstOrNew(["id" => $id]);
        $save->nim      = $data["nim"];
        $save->name     = $data["name"];
        $save->gender   = $data["gender"];
        $save->religion = $data["religion"];
        $save->address  = $data["address"] ?? "";
        $save->phone    = $data["phone"] ?? "";
        $save->save();

        return $save;
    }

    public function deleteMahasiswa($id) {
        return $this->find($id)->delete();
    }
}
