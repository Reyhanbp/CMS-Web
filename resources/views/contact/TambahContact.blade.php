@extends('admin.Admin')
@section('title', 'Tambah MasterContact')
@section('content')
  <div class="card">

    <div class="card-header">
    <div class="card-title w-100 d-flex justify-content-between">
        <h3>Master Contact </h3>
          <a class="btn btn-danger" role="button" data-bs-toggle="button" href="{{ route ('mastercontact') }}">
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
        <form action="{{ route ('sendcontact') }}" method="POST" enctype="multipart/form-data" >
          @csrf
        <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div class="mb-8">
              <label for="name" class="form-label required"> Name  </label>
              <input type="text" name="name" id="name" placeholder="Isi Disini"
                class="form-control" required autoComplete="off"  />
            </div>
          </div>

          <div class="col-6">
            <div class="mb-8">
              <label  for="master_siswa_id" class="form-label required">Master Siswa</label>
              <select class="form-control" name="master_siswa_id"
              placeholder="Pilih">
              <option value="">Pilih</option>
              @foreach ($DataListSiswa as $master_siswas)
                          <option value="{{$master_siswas -> id}}">{{$master_siswas ->nama}}</option>
                          @endforeach
                    </select>
                </div>
              </div>
          <div class="col-6">
            <div class="mb-8">
              <label  for="contact_type_id" class="form-label required">Contact Type</label>
              <select class="form-control" name="contact_type_id"
              placeholder="Pilih">
              <option value="">Pilih</option>
              @foreach ($DataListContact as $contact_types)
                          <option value="{{$contact_types -> id}}">{{$contact_types -> type_name}}</option>
                          @endforeach
                    </select>
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
