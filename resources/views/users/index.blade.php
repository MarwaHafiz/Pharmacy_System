@extends('admin_layouts.admin')
@section('content')

<div class="d-flex align-content-stretch flex-wrap" style="text-align:center">
    <div class="container " style="text-align:center">
        <br>
      
  <a href="{{route('users.create')}}"  class="btn btn-success mb-5" style="align-center" >Add New User</a></div>
      <table class="table table-bordered table-hover table-dark" class="mx-auto" style="background-color: 	rgb(52, 57, 64)">
        <thead class="thead-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Gender</th>
              <th scope="col">Avatar</th>
              <th scope="col" colspan="2">Date Of Birth</th>
              <th scope="col">National-ID</th>
              <th scope="col">Mobile-Number</th>
              <th scope="col">Created-At</th>
              <th scope="col" colspan="3">Actions</th>
            </tr>
          </thead>
          @foreach ($users as $user)
            <tbody>
              <tr>
                <th scope="row">{{ $user->id }}</th>
                <td scope="col">{{ $user->name }}</td>
                <td scope="col">{{ $user->email }}</td>
                <td scope="col">{{ $user->gender }}</td>
                <td><img src="{{asset('uploads/users/'.$user->image)}}" width="90px" height="90px"></td>
                <td scope="col" colspan="2">{{ $user->date_of_birth }}</td>
                <td scope="col">{{ $user->national_id }}</td>
                <td scope="col">{{ $user->mobile_number }}</td>
                <td scope="col">{{ $user->created_at }}</td>
                <td><a href="{{route('users.show',['user'=>$user['id']])}}" class="btn btn-primary btn-sm">  <i class="fas fa-folder">
                </i> View</a></td>
              <td><a href="{{route('users.edit',['user'=>$user['id']])}}" class="btn btn-info btn-sm"> <i class="fas fa-pencil-alt">
              </i> Edit</a></td> 
              <td> 
                  <form method="POST" action="{{route('users.destroy',['user'=>$user['id']])}}">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                  </form>
              </td> 
              </tr>  
            </tbody>
          @endforeach
        </table> 
      
  </div>

  @endsection