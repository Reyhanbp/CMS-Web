@extends('admin.Admin')
@section('title', 'MasterSiswa')
@section('content')
  <div class="card">
    <div class="card-header">
      <div class="card-title w-100 d-flex justify-content-between">
        <h3>Master Siswa </h3>
          <a class="btn btn-primary" role="button" data-bs-toggle="button" href="{{ route ('tambahmastersiswa') }}">
          <i class="fas fa-plus"></i>
             Tambah baru
          </a>
      </div>
    </div>
     <!-- Begin Page Content -->
    <div class="container-fluid mt-3">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Table</h6>
        </div>

        <div class="card-body">
            @if (Session::has('message'))
                <div class="alert alert-success">
                        {{Session::get('message')}}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomer</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Photo</th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach ($DataList as $master_siswas)

                    <tbody>
                        <tr>
                            <td>{{$loop->iteration }}</td>
                            <td>{{$master_siswas -> nama }}</td>
                            <td>{{$master_siswas -> kelas }}</td>
                            <td>{{$master_siswas -> jurusan }}</td>
                            <td>
                                <img src="{{ asset('storage/'.$master_siswas->photo) }}" alt="test"
                                width="50px" >
                            </td>
                            <td>

                            <form action="{{ route('deletesiswa', $master_siswas->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-warning" role="button"  href="{{ route ('editmastersiswa', $master_siswas->id) }}">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                 </a>
                                <button id="deleteButton" class="btn btn-danger"  role="button">
                                <i class="fas fa-trash"></i>
                                    Delete
                                </button>
                            </form>
                            </td>
                        </tr>

                    </tbody>
                    @endforeach
                </table>

            </div>
            {{$DataList->links('pagination::bootstrap-5')}}
        </div>
    </div>

    </div>
    <!-- /.container-fluid -->

    </div>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Menangani klik tombol "Delete"
        $('#deleteButton').click(function (e) {
            e.preventDefault(); // Mencegah form dikirim secara langsung

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger mr-2',
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: 'Anda Yakin Ingin Menghapus?',
                text: "Data Tidak Akan Kembali Lagi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengonfirmasi, kirim form penghapusan
                    $('form').submit();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire(
                        'Dibatalkan',
                        'Tidak ada perubahan didatanya:)',
                        'error' // Menggunakan 'info' untuk menampilkan pesan info
                    );
                }
            });
        });
    });
</script>

    <!-- End of Main Content -->
@endsection


