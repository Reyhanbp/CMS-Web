@extends('admin.Admin')
@section('title', 'EditMasterSiswa')
@section('content')
<div class="card">
    <div class="card-header">
    <div class="card-title w-100 d-flex justify-content-between">
        <h3>Edit MasterSiswa </h3>
          <a class="btn btn-danger" role="button" data-bs-toggle="button" href="{{ route ('mastersiswa') }}">
          <i class="fas fa-times-circle"></i>
            Batal
          </a>
      </div>
    </div>

    <div class="container-fluid mt-3">
      <div class="card shadow mb-4">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
          @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
          @endforeach
        </ul>
        </div>
      @endif
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">DATA BARU</h6>
        </div>
        <form action="{{ route ('updatesiswa', $mastersiswa->id) }}" method="POST" enctype="multipart/form-data">
          @csrf

        <div class="card-body">
        <div class="row">
           <div class="col-12 d-flex justify-content-center" >
            <div class="mb-3">
            <label for="photo" class="form-label">photo :</label>
            <br>
             <img class="img-thumbnail" width="300px" src="{{asset('/storage/'.$mastersiswa->photo)}}">
             </div>
          </div>
          <div class="col-6">
            <div class="mb-8">
              <label for="nama" class="form-label required"> Name  </label>
              <input type="text" name="nama" id="nama" value="{{ $mastersiswa -> nama }}" placeholder="Isi Disini"
                class="form-control" required autoComplete="off"  />
            </div>
          </div>
          <div class="col-6">
            <div class="mb-8">
              <label for="kelas" class="form-label required"> Kelas  </label>
              <input type="text" name="kelas" id="kelas"  value="{{ $mastersiswa -> kelas }}" placeholder="Isi Disini"
              class="form-control" required autoComplete="off"  />
            </div>
          </div>
          <div class="col-12">
            <div class="mb-8">
              <label  for="jurusan" class="form-label required">Jurusan</label>
              <select class="form-control" name="jurusan" required
              placeholder="Pilih"  value="{{ $mastersiswa -> jurusan }}" selected>
                          <option value="" >Pilih</option>
                          <option value="Perhotelan" selected>Perhotelan</option>
                          <option value="PSPT" selected>PSPT</option>
                          <option value="OTKP" selected>OTKP</option></option>
                          <option value="BDP" selected>BDP</option>
                          <option value="MULTIMEDIA" selected>MULTIMEDIA</option>
                          <option value="DKV" selected>DKV</option>
                          <option value="AKL" selected>AKL</option>
                          <option value="TKJ" selected>TKJ</option>
                          <option value="RPL" selected>RPL</option>
                          <option value="MANEJEMEN LOGISTIC" selected>MANEJEMEN LOGISTIC</option>
                    </select>
                </div>
              </div>
           <div class="col-12">
              <div class="mb-8">
                <label for="Photo" class="form-label">Photo</label>
                <input class="form-control" type="file" name="photo">
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
@endsection

