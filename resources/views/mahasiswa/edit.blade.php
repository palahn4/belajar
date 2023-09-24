@extends("template.main")

@section("css")
    
@endsection

@section("content")
    <div class="container w-50">
        <h1 class="text-center my-3">{{ $title }}</h1>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center py-3">
                <h5 class="m-0">NIM : {{ $data->nim }}</h5>
                <button type="button" class="btn btn-sm btn-primary" onclick="history.back()">Kembali</button>
            </div>
            <div class="card-body">
                <form action="{{ url('/mahasiswa/update', $data->nim) }}" method="POST" id="updateForm">
                    @csrf
                    <div class="mb-3">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $data->name }}">
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="gender">Jenis Kelamin</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value="L" @if ($data->gender == "L") selected @else  @endif>Laki-laki</option>
                                <option value="P" @if ($data->gender == "P") selected @else  @endif>Perempuan</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="religion">Agama</label>
                            <select class="form-control" name="religion" id="religion">
                                <option value="Islam" @if ($data->religion == "Islam") selected @else  @endif>Islam</option>
                                <option value="Katolik" @if ($data->religion == "Katolik") selected @else  @endif>Katolik</option>
                                <option value="Protestan" @if ($data->religion == "Protestan") selected @else  @endif>Protestan</option>
                                <option value="Hindu" @if ($data->religion == "Hindu") selected @else  @endif>Hindu</option>
                                <option value="Budha" @if ($data->religion == "Budha") selected @else  @endif>Budha</option>
                                <option value="Kong Hu Chu" @if ($data->religion == "Kong Hu Chu") selected @else  @endif>Kong Hu Chu</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address">Alamat</label>
                        <textarea class="form-control" name="address" id="address" cols="30" rows="5s">{{ $data->address }}</textarea>
                    </div>
                    <div>
                        <label for="phone">Telepon/WA</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ $data->phone }}">
                    </div>
                </form>
            </div>
            <div class="card-footer text-end">
                <button type="button" class="btn btn-sm btn-success" onclick="submitUpdate()">Update</button>
            </div>
        </div>
    </div>
@endsection

@section("js")
    <script>
        function submitUpdate() {
            $("#updateForm").submit()
        }
    </script>
@endsection