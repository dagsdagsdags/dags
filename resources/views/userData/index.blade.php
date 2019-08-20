@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>User data list</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{route('Data.create')}}">Create new data</a>
      </div>
    </div>
    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif
    <div class="row">
      <div class="col-md-4">
        <form class="" action="{{route('Data.index')}}" method="get">
          <div class="form-group">
            <input type="search" name="s" value="{{isset($s) ? $s: ''}}" class="form-control">
            <span class="form-group-btn">
              <br>
              <button type="submit" name="button" class="btn btn-primary">Search</button>
            </span>
          </div>
        </form>
      </div>
    </div>
    <table class="table table-hover table-sm">
      <tr>
        <th width = "50px">No.</th>
        <th width = "300px">Name</th>
        <th>Description</th>
        <th width = "180px">Action</th>
      </tr>
      @foreach ($udatas as $data)
        <tr>
          <td><b>{{++$i}}.</b></td>
          <td>{{$data->name}}</td>
          <td>{{$data->desc}}</td>
          <td>
            <form class="" action="{{route('Data.destroy', $data->id)}}" method="post">
              <a class="btn btn-sm btn-success" href="{{route('Data.show',$data->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('Data.edit',$data->id)}}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger" name="button">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>
  {!!$udatas->appends(['s' => $s])->links()!!}
  </div>

@endsection
