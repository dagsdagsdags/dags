@extends('layouts.app')
@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3>Details</h3>
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <strong>Name &nbsp;</strong> {{$data->name}}
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <strong>Description &nbsp;</strong> {{$data->desc}}
          </div>
        </div>
        <div class="col-md-12">
          <a href="{{route('Data.index')}}" class="btn btn-sm btn-success">Back</a>
        </div>
      </div>
    </div>
@endsection
