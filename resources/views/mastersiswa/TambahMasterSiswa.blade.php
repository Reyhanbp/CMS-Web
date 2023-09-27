@extends('admin.Admin')
@section('title', 'Tambah MasterSiswa')
@section('content')
  <div class="card">
    <div class="card-header">
    <div class="card-title w-100 d-flex justify-content-between">
        <h3>Master Siswa </h3>
          <a class="btn btn-danger" role="button" data-bs-toggle="button" href="{{ route ('mastersiswa') }}">
          <i class="fas fa-times-circle"></i>
            Batal
          </a>
      </div>
    </div>
    <div class="container-fluid mt-3">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">DATA BARU</h6>
        </div>
        <form action="{{ route ('sendsiswa') }}" method="POST"  enctype="multipart/form-data">
          @csrf
        <div class="card-body">
        @if (Session::has('message'))
            <div class="alert alert-success">
             {{Session::get('message')}}
            </div>
        @endif
        <div class="row">
          <div class="col-6">
            <div class="mb-8">
              <label for="nama" class="form-label required"> Name : </label>
              <input type="text" name="nama" id="nama" placeholder="Isi Disini"
                class="form-control" required autoComplete="off"  />
            </div>
          </div>
          <div class="col-6">
            <div class="mb-8">
              <label for="kelas" class="form-label required"> Kelas : </label>
              <input type="text" name="kelas" id="kelas" placeholder="Isi Disini"
              class="form-control" required autoComplete="off"  />
            </div>
          </div>
          <div class="col-6">
            <div class="mb-8">
              <label  for="jurusan" class="form-label required">Jurusan :</label>
              <select class="form-control" name="jurusan"
              placeholder="Pilih">
                          <option value="">Pilih</option>
                          <option value="Perhotelan">Perhotelan</option>
                          <option value="PSPT">PSPT</option>
                          <option value="OTKP">OTKP</option></option>
                          <option value="BDP">BDP</option>
                          <option value="MULTIMEDIA">MULTIMEDIA</option>
                          <option value="DKV">DKV</option>
                          <option value="AKL">AKL</option>
                          <option value="TKJ">TKJ</option>
                          <option value="RPL">RPL</option>
                          <option value="MANEJEMEN LOGISTIC">MANEJEMEN LOGISTIC</option>
                    </select>
                </div>
              </div>
              <div class="col-6">
                <div class="mb-8">
                  <label for="photo">
                    Image :
                  </label>
                  <input type="file" class="form-control" name="photo" required>
                </div>
            </div>
          <div class="col-12">
            <br>
            <button type="submit" class="btn btn-primary btn-sm ms-auto mt-8 d-block">
              <i class="fas fa-save"></i>
              Simpan
          </button>
          </div>
        </div>
        </form>

        </div>
      </div>

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

@endsection
