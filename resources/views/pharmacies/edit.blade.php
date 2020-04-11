@extends('admin_layouts.admin')
@section('content')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" >Pharmacy Editing</a>
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


<form method="POST" action="{{route('pharmacies.update',['pharmacy' => $pharmacy->id])}}">
    @method('PUT')
    @csrf
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault01">created_at</label>
        <input name="created_at" type="text" class="form-control" id="validationDefault01"  value="{{ $pharmacy['created_at'] }}" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="validationDefault02">Name</label>
        <input name="name" type="text" class="form-control" id="validationDefault02" value="{{ $pharmacy['name'] }}" required>
      </div>
 
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationDefault01">Email</label>
          <input name="email" type="text" class="form-control" id="validationDefault01" value="{{ $pharmacy['email'] }}" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="validationDefault02">Password</label>
          <input name="password" type="text" class="form-control" id="validationDefault02" value="{{ $pharmacy['password'] }}" required>
        </div>

        <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationDefault01">National_id</label>
              <input name="national_id" type="text" class="form-control" id="validationDefault01" value="{{ $pharmacy['nationa_id'] }}" required>
            </div>

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationDefault01">revenue</label>
                <input name="revenue" type="text" class="form-control" id="validationDefault01" value="{{ $pharmacy['revenue'] }}" required>
              </div>

            <div class="col-md-6 mb-3">
             <label for="exampleFormControlFile1">Image</label>
             <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1" value="{{ $pharmacy['imge'] }}">
             </div>

            
            <div >
                  <label for="validationDefault01">Area_Id</label>
                  <input name="area_id" type="text" class="form-control" id="validationDefault01" value="{{ $pharmacy['area_id'] }}" required>
                </div>
                <div class="row">
                 <button class="btn btn-primary" type="submit">Update</button>
                </div>
  </form>


@endsection