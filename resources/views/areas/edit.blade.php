@extends('admin_layouts.admin')
@section('content')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" >Editing an area</a>
</nav>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{route('areas.update',['area' => $area->id])}}">
@method('PUT')
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{ $area['name'] }}" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input type="text" name="address" value="{{ $area['address']  }}"class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection