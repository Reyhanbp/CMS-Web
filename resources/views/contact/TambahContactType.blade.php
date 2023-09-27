@extends('admin.Admin')
@section('title', 'Tambah Contact Type')
@section('content')
  <div class="card">
 
    <div class="card-header">
    <div class="card-title w-100 d-flex justify-content-between">
        <h3>Contact Type </h3>
          <a class="btn btn-danger" role="button" data-bs-toggle="button" href="{{ route ('contact_type') }}">
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
        <form action="{{ route ('sendtype') }}" method="POST">
          @csrf
        <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div class="mb-8">
              <label for="type_name" class="form-label required"> Type Contact  </label>
              <input type="text" name="type_name" id="type_name" placeholder="Isi Disini"
                class="form-control" required autoComplete="off"  />
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