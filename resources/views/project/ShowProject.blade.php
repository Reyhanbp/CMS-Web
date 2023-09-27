@if ($datas->isEmpty())
    <h6 class="text-center">Siswa belum mempunyai project</h6>
@else
  @foreach ($datas as $data)
 <div class="card mb-5">
  <div class=" card-header bg-primary text-white d-flex justify-content-between">
    <div>
        <span>{{$data->project_name}}</span>
    </div>
    <form action="{{ route('deleteproject', $data->id) }}" method="POST">
        @csrf
        @method('DELETE')
    <div>
        <a type="button" class="btn btn-warning" href="{{ route ('editmasterproject', $data->id) }}"><i class="far fa-edit">Edit</i></a>
        <button id="deleteButton" class="btn btn-danger"  role="button" ></a><i class="fas fa-trash">Delete</i></button>
    </div>
</form>
  </div>
    <div class="card-body d-flex justify-content-between">
    <div>
       
        <img src="{{ asset('/storage/'.$data->photo) }}" alt="">
    </div>
    <div>
        <h6 class="card-title">Tanggal Project</h6>
        <p class="card-text">{{$data->project_date}}</p>
    </div>
    </div>

</div>
  @endforeach
@endif
