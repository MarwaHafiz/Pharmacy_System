@extends('admin_layouts.admin')
@section('content')

@if ($errors->any())
{{--  to display error messages --}}
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <section class="content-header ">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Doctor's Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Doctor Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    {{-- <div class=“container”>
        <div class=“row”> --}}
    {{-- <div class="row h-20 justify-content-center align-items-center"> --}}
        {{-- <div class="col-10 col-md-8 col-lg-6"> --}}
  {{-- <form method="POST" action="{{route('posts.store')}}">
      @csrf --}}
    <section class="content h-100 ">
      <div class="row">
        <div class="col-md-6 ">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">EDIT</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('doctors.update',['doctor' => $doctor->id])}}">
                    @method('PUT')
                    @csrf
              <div class="form-group">
                <label for="inputName">Doctor's Name</label>
              <input type="text" id="inputName" name="name" class="form-control" value="{{$doctor->name}}">
              </div>
              <div class="form-group">
                <label for="inputName">Doctor's Email</label>
                <input type="text" id="inputName" name="email" class="form-control" value="{{$doctor->email}}">
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Password</label>
                <input type="password" name="password" id="inputClientCompany" class="form-control" value="{{$doctor->name}}">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">National ID</label>
                <input type="text" id="inputProjectLeader"  name= "national_id"class="form-control" value="{{$doctor->national_id}}">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Avatar</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name= "image" class="custom-file-input" id="image" accept="image/*">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  {{-- <div class="input-group-append">
                    <span class="input-group-text" id="">Upload</span>
                  </div> --}}
                </div>
              </div>

              <div class="form-group">
                <label for="inputStatus">Pharmacies</label>
                <select name="pharmacy_id" class="form-control custom-select">
                  {{-- <option selected disabled>Select Pharmacy</option> --}}
                  @foreach($pharmacies as $pharmacy)
                  <option value="{{$pharmacy->id}}">{{$pharmacy->id}}</option>
                  @endforeach
                </select>
              </div>
              
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>


        <div class="row ">
        <div class="col-12">
          <a href="{{route('doctors.index')}}" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Edit Doctor" class="btn btn-success float-right">
        </form>
        </div>
      </div>
    </section>

    <!-- /.content -->
  </div>
  
    
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.4
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>

@endsection