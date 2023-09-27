@extends('admin.Admin')
@section('title', 'Tambah MasterContact')
@section('content')
  <div class="card">

    <div class="card-header">
    <div class="card-title w-100 d-flex justify-content-between">
        <h3>Master Project </h3>
          <a class="btn btn-danger" role="button" data-bs-toggle="button" href="{{ route ('masterproject') }}">
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
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
             @foreach($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
            </div>
        @endif
        <form action="{{ route ('updateproject', $data->id) }}" method="POST" enctype="multipart/form-data" >
          @csrf
        <div class="card-body">
            <div class="row">
                 <div class="col-12 d-flex justify-content-center" >
                <div class="mb-3">
                <label for="photo" class="form-label">photo :</label>
                <br>
                   <img class="img-thumbnail" width="300px" src="{{asset('/storage/'.$data->photo)}}">
                   </div>
                </div>
            <div class="col-6">
              <div class="mb-1">
                <label for="photo" class="form-label required"> Photo  </label>
                <input type="file" name="photo" id="photo" placeholder="Isi Disini"
                  class="form-control"  autoComplete="off"  />
              </div>
            </div>
          <div class="col-6">
            <div class="mb-1">
              <label for="project_name" class="form-label required"> Name Project  </label>
              <input type="text" name="project_name" id="project_name" placeholder="Isi Disini"
                class="form-control" required autoComplete="off" value="{{ $data -> project_name }}"   />
            </div>
          </div>
          <div class="col-6">
            <div class="mb-1">
              <label for="project_date" class="form-label required"> Tanggal Project  </label>
              <input type="date" name="project_date" id="project_date" placeholder="Isi Disini"
                class="form-control" required autoComplete="off" value="{{ $data -> project_date }}" />
            </div>
          </div>

          <div class="col-6">
            <div class="mb-1">
                <input type="hidden" name="master_siswa_id" id="master_siswa_id" placeholder="Isi Disini"
                class="form-control" required autoComplete="off"  readonly value="{{ $data ->mastersiswa->id }}" />
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
