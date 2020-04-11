@extends('admin_layouts.admin')
@section('content')
<div class="d-flex align-content-stretch flex-wrap" style="text-align:center">
    <div class="container " style="text-align:center">

      
      <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>pharmacy Data</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">pharmacy Data</li>
                </ol>
              </div>
            </div>
          </div>
        </section>

        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="{{asset('uploads/pharmacies/'.$pharmacy->image)}}"
                   alt="User profile picture">
            </div>
      
  
        <section class="content">
      
          <div class="card">
            <div class="card-header">
              <h2 class="card-text">pharmacy {{ $pharmacy->id }} Information</h2>
              <div class="card-body">
              <br>
              <strong><i class="fas fa-book mr-1"></i> Name</strong>
           {{ $pharmacy->name }}

          
          <h5 class="card-text"> <strong><i class="fas fa-pencil-alt mr-1"></i> Email </strong>{{ $pharmacy->email  }}</h5>
          <h5 class="card-text">Nationa Id:- {{ $pharmacy->national_id}}</h5>
          <h5 class="card-text">area:- {{ $pharmacy->area_id }}</h5>
        </div>
      </div>
      
      @endsection

