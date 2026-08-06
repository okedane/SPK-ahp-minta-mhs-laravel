<x-app>
    <x-slot:title>Angkatan</x-slot:title>
    <div class="page-content">
        
        <div class="card">
             <div class="row mb-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Daftar Angkatan</h4>
                            <button type="button" class="btn btn-primary waves-effect waves-light"
                                data-bs-toggle="modal" data-bs-target="#myModal">Tambah Angkatan</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered dt-responsive nowrap w-100" id="datatable">
                    <thead>
                        <tr>
                            <th style="width:20px">No</th>
                            <th>Angkatan</th>
                            <th style="text-align: center; width: 100px;" class="no-export">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($angkatan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->angkatan }}</td>
                            <td style="text-align: center; width: 100px;">
                                <div class="d-flex justify-content-center gap-2">

                                    <!-- Gunakan div container untuk menyusun tombol secara horizontal -->
                                    <div class="d-flex align-items-center gap-2">
                                        <!-- Edit Button -->
                                        <a href="#" data-bs-target="#editModal{{ $item->id }}"
                                            data-bs-toggle="modal"
                                            class="btn btn-sm btn-info"
                                            title="Edit">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>

                                        <!-- Delete Button -->
                                        <button type="button"
                                            class="btn btn-sm btn-danger"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $item->id }}"
                                            title="Hapus">
                                            <i class="mdi mdi-trash-can"></i>
                                        </button>

                                        <form action="{{ route('angkatan.destroy', $item->id) }}" method="POST"
                                            id="deleteForm{{ $item->id }}" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                        <!-- Modal Konfirmasi Hapus -->
                                        <div class="modal fade" id="deleteModal{{ $item->id }}"
                                            tabindex="-1" aria-labelledby="deleteModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">
                                                            Konfirmasi
                                                            Penghapusan</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus angkatan
                                                        <strong>{{ $item->angkatan }}</strong>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>  
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="document.getElementById('deleteForm{{ $item->id }}').submit();">Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </td>

                        </tr>

                        <!-- Edit Modal -->
                        <div id="editModal{{ $item->id }}" class="modal fade" tabindex="-1"
                            aria-labelledby="editModalLabel" aria-hidden="true" data-bs-scroll="true"
                            data-bs-backdrop="static">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Edit
                                            Data angkatan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form class="needs-validation"
                                        action="{{ route('angkatan.update', $item->id) }}" method="POST"
                                        novalidate>
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <!-- Nama -->
                                            <div class="mb-3">
                                                <label class="form-label" for="angkatan">Angkatan</label>
                                                <input type="number" class="form-control" id="angkatan"
                                                    name="angkatan" value="{{ $item->angkatan }}" required>
                                                <div class="invalid-feedback">Angkatan harus
                                                    diisi.</div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary waves-effect"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit"
                                                class="btn btn-primary waves-effect waves-light">Simpan
                                                Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- /.modal -->
            </div> <!-- end preview-->
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
    </div>

    <!-- sample modal content -->
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        data-bs-scroll="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Angkatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" action="{{ route('angkatan.store') }}" method="POST" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Angkatan</label>
                            <input type="number" class="form-control" id="validationCustom01"
                                placeholder="Masukan Angkatan" name="angkatan" required>
                            <div class="invalid-feedback">
                                Angkatan harus diisi
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect"
                                data-bs-dismiss="modal">Tutup</button>
                                <button type="reset" class="btn btn-secondary waves-effect">Reset</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan
                                Perubahan</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>


</x-app>