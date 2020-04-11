@extends('admin_layouts.admin')
@section('content')

<div class="d-flex align-content-stretch flex-wrap" style="text-align:center">
    <div class="container " style="text-align:center">
        <br>
        <center>
            <div class="card" style="width: 18rem;">
              <center>  <img src="{{asset('uploads/users/'.$user->image)}}" width="90px" height="90px"> </center>
                <div class="card-body">
                    <div class="card-header">
                      {{ $user->name }}
                    </div>
                    <!-- <h5 class="card-title">{{ $user->name }}</h5> -->
                    <!-- <hr> -->
                    <p class="card-text"> Email: {{ $user->email }}</p>
                    <p class="card-text"> Gender: {{ $user->gender }}</p>
                    <p class="card-text"> BirthDate: {{ $user->date_of_birth }}</p>
                    <p class="card-text">NationalID: {{ $user->national_id }}</p>
                    <p class="card-text"> MobileNumber: {{ $user->mobile_number }}</p>
                    <p class="card-text"> CreatedAt: {{ $user->created_at }}</p>
                    <a href="{{route('users.index')}}" class="btn btn-primary">Back to table</a>
                </div>
            </div>
        </center>
    </div>
      
</div>

  @endsection