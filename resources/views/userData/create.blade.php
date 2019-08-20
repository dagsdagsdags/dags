@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>New Data</h3>
      </div>

    </div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! &nbsp;</strong>there were some problems with your input
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>

          @endforeach
        </ul>
      </div>
    @endif
    <form class="" action="{{route('Data.store')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <strong>Name &nbsp;
          </strong>
          <input type="text" name="name" class="form-Controller" value="" placeholder="Name">
        </div>

        <div class="col-md-12">
          <strong>Description &nbsp;</strong>
          <textarea name="desc" class="form-control" placeholder="Description" rows="8" cols="80"></textarea>
        </div>

        <div class="col-md-12">
          <a href="{{route('Data.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary" name="button">Submit</button>

        </div>
      </div>
    </form>
  </div>

@endsection
