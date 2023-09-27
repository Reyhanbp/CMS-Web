@extends('admin.admin')
@section('title', 'Master Project')


@section('content')

    <div class="row">
    <div class="col-lg-5">
        <div class="card shadow">
        <div class="card-header">
            <h6>Data Siswa</h6>

        </div>
        <div class="card-body">
              @if (Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            <table class="table">
            <thead>
                <tr>
                <th>No. </th>
                <th>Nama </th>
                <th>Action </th>
                </tr>
            </thead>
            @foreach ($datas as $data)
            <tr>
                <td>{{$loop -> iteration}}</td>
                <td>{{$data -> nama}}</td>
                <td>
                <a class="btn btn-info" onClick="show({{$data->id}})" > <i class="fas fa-folder-open"></i></a>
                <a class="btn btn-success" href="{{route('tambahmasterproject', $data -> id)}}"><i class="fas fa-plus"></i></a>
                </td>
            </tr>
            @endforeach
            </table>
        </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card shadow">
        <div class="card-header">
            <h6>Daftar Project</h6>
        </div>
        <div class="card-body" id="project">
            <h6 class="text-center">Silahkan pilih siswa terlebih dahulu</h6>
        </div>
        </div>
    </div>
    </div>

<script>
    function show (id){
        $.get('/masterproject/show/'+id,function(data){
            $('#project').html(data);
        })
    }
</script>

@endsection
