@extends("template.main")

@section("css")
    
@endsection

@section("content")
    <div class="container">
        <h1 class="text-center my-3">{{ $title }}</h1>
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center py-3">
                <h5 class="m-0">List Record Mahasiswa</h5>
                <button type="button" class="btn btn-sm btn-primary" onclick="promptAdd()">Add</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Phone</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswa as $value)
                                <tr class="text-center">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $value->nim }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ ($value->gender == "L") ? "Laki-laki" : "Perempuan" }}</td>
                                    <td>{{ $value->phone }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-info" onclick="goTo('detail', {{ $value->nim }})">Detail</button>
                                        <button type="button" class="btn btn-sm btn-success" onclick="goTo('edit', {{ $value->nim }})">Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="promptDelete({{ $value->nim }})">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="addModal">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal()"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url("mahasiswa/store") }}" method="POST" id="addForm">
                        @csrf
                        <div class="mb-3">
                            <label for="nim">NIM</label>
                            <input type="text" class="form-control" name="nim" id="nim" value="{{ $nim }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="gender">Jenis Kelamin</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="religion">Agama</label>
                            <select class="form-control" name="religion" id="religion">
                                <option value="Islam">Islam</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Kong Hu Chu">Kong Hu Chu</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="address">Alamat</label>
                            <textarea class="form-control" name="address" id="address" cols="30" rows="5"></textarea>
                        </div>
                        <div>
                            <label for="phone">Telepon/WA</label>
                            <input type="text" class="form-control" name="phone" id="phone">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal" onclick="closeModal()">Close</button>
                    <button type="button" class="btn btn-sm btn-primary" onclick="submitAdd()">Add</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal" tabindex="-1" id="deleteModal">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal()"></button>
                </div>
                <div class="modal-body">
                    Apakah kamu yakin ingin <strong>Menghapus</strong> data mahasiswa ini?
                    <form action="/mahasiswa/delete" method="POST" id="deleteForm">
                        @csrf
                        <input type="hidden" name="nim" id="dnim">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeModal()">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitDelete()">Delete</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("js")
    <script>
        $("#myTable").dataTable()

        function goTo(action, nim) {
            window.location.href = "{{ url('/mahasiswa') }}" + "/" + action + "/" + nim
        }

        function openModal(action) {
            $("#" + action + "Modal").show()
        }

        function closeModal() {
            $(".modal").hide()
        }

        function promptAdd() {
            openModal("add")
        }

        function submitAdd() {
            const aform = $("#addForm")

            aform.serialize()
            aform.submit()
            closeModal()
        }
        
        function promptDelete(nim) {
            openModal("delete")
            $("#dnim").val(nim)
        }
        
        function submitDelete() {
            const dform = $("#deleteForm")

            dform.serialize()
            dform.submit()
            closeModal()
        }
    </script>
@endsection