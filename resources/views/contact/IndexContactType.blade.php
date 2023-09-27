@extends('admin.Admin')
@section('title', 'Mastercontact')
@section('content')
  <div class="card">
    <div class="card-header">
      <div class="card-title w-100 d-flex justify-content-between">
        <h3>Contact Type </h3>
          <a class="btn btn-primary" role="button" data-bs-toggle="button" href="{{ route ('tambahcontact_type') }}">
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
            <div class="row">
            <div class="mb-8">
                <label>
                    <select class="datatable-selector">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </label>
            </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomer</th>
                            <th>Name</th>
                            
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($DataList as $contact_types)
                        <tr>
                            <td>{{$contact_types -> id }}</td>
                            <td>{{$contact_types -> type_name }}</td>
                            
                            <td>
                            <a class="btn btn-warning" role="button"  href="{{ route ('tambahmastersiswa') }}">
                                    <i class="fas fa-trash"></i>
                                    Edit
                                 </a>
                            <a class="btn btn-danger" role="button"  href="{{ route ('tambahmastersiswa') }}">
                                <i class="fas fa-trash"></i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                      
                    </tbody>
                  @endforeach
                </table>
            </div>
        </div>
    </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection

 
