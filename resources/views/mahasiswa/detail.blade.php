@extends("template.main")

@section("css")
    
@endsection

@section("content")
    <div class="container w-50">
        <h1 class="text-center my-3">{{ $title }}</h1>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center py-3">
                <h5 class="m-0">Biodata Mahasiswa</h5>
                <button type="button" class="btn btn-sm btn-primary" onclick="history.back()">Kembali</button>
            </div>
            <div class="card-body pb-0">
                <div class="table-responsive">
                    <table class="table table-bordered" style="vertical-align: middle">
                        <tr>
                            <th width="20%">NIM</th>
                            <td width="1%">:</td>
                            <td>{{ $data->nim }}</td>
                        </tr>
                        <tr>
                            <th width="20%">Nama</th>
                            <td width="1%">:</td>
                            <td>{{ $data->name }}</td>
                        </tr>
                        <tr>
                            <th width="20%">Jenis Kelamin</th>
                            <td width="1%">:</td>
                            <td>{{ ($data->gender == "L") ? "Laki-laki" : "Perempuan" }}</td>
                        </tr>
                        <tr>
                            <th width="20%">Agama</th>
                            <td width="1%">:</td>
                            <td>{{ $data->religion }}</td>
                        </tr>
                        <tr>
                            <th width="20%">Alamat</th>
                            <td width="1%">:</td>
                            <td>{{ $data->address }}</td>
                        </tr>
                        <tr>
                            <th width="20%">Telepon/WA</th>
                            <td width="1%">:</td>
                            <td>{{ $data->phone }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("js")

@endsection