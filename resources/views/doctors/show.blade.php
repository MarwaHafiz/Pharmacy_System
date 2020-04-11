@extends('admin_layouts.admin')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Profile</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Doctor Profile</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="{{asset('uploads/doctors/'.$doctor->image)}}"
                   alt="User profile picture">
            </div>

          <h3 class="profile-username text-center">{{$doctor->name}}</h3>

            <p class="text-muted text-center">Doctor</p>

           <form method="POST" class='d-inline' action=''>
              @method('PATCH') 
              @csrf
            @if($doctor->ban_flag)         
            {{-- if ban status true -> unban action --}}
              <td><a href="{{route('doctors.unban',['doctor' => $doctor->id])}}" class="btn btn-success btn-block" data-id='$doctor->id' >  <i class="fas fa-user-slash">
              </i> UnBan</a></td>           
            @else
            {{-- if ban status false -> ban action --}}
              <td><a href="{{route('doctors.ban',['doctor' => $doctor->id])}}" class="btn btn-warning btn-block" data-id='$doctor->id'>  <i class="fas fa-user-slash">
              </i> Ban</a></td>    
            @endif
          </form>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">About Doctor</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <strong><i class="fas fa-book mr-1"></i> Name</strong>

            <p class="text-muted">
             {{$doctor->name}}
            </p>

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Hired On</strong>

            <p class="text-muted">{{$doctor->created_at}}</p>

            <hr>

            <strong><i class="fas fa-pencil-alt mr-1"></i> Email</strong>

            <p class="text-muted">
              <span class="tag tag-danger">{{$doctor->email}}</span>
           
            </p>

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> National ID</strong>

            <p class="text-muted">{{$doctor->national_id}}</p>

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i>Pharmacy</strong>

            <p class="text-muted">{{ $doctor->pharmacy->name}}</p>
            <hr>

            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
     
                
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
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