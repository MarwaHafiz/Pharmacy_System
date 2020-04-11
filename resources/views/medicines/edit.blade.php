@extends('admin_layouts.admin')
@section('content')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" >Editing a medicine</a>
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
<form method="POST" action="{{route('medicines.update',['medicine' => $medicine->id])}}">
@method('PUT')
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{ $medicine['name'] }}" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Quantity</label>
    <input type="text" name="quantity" value="{{ $medicine['quantity']  }}"class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Type</label>
    <input type="text" name="type" value="{{ $medicine['type']  }}"class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Price</label>
    <input type="text" name="price" value="{{ $medicine['price']  }}"class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>


@endsection