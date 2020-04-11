@extends('admin_layouts.admin')
@section('content')

<div class="d-flex align-content-stretch flex-wrap" style="text-align:center">
    <div class="container " style="text-align:center">
        <br>
      
  <a href="{{route('addresses.create')}}"  class="btn btn-success mb-5" style="align-center" >Add New UserAddress</a></div>
      <table class="table table-bordered table-hover table-dark" class="mx-auto" style="background-color: 	rgb(52, 57, 64)">
        <thead class="thead-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">street_name</th>
              <th scope="col">building_number</th>
              <th scope="col">floor_number</th>
              <th scope="col">flat_number</th>
              <th scope="col">is_main</th>
              <th scope="col">area_id</th>
              <th scope="col">user_id</th>
              <th scope="col">Created-At</th>
              <th scope="col" colspan="3">Actions</th>
            </tr>
          </thead>
          @foreach ($addresses as $address)
            <tbody>
              <tr>
                <th scope="row">{{ $address->id }}</th>
                <td scope="col">{{ $address->street_name}}</td>
                <td scope="col">{{ $address->building_number}}</td>
                <td scope="col">{{ $address->floor_number}}</td>
                <td scope="col">{{ $address->flat_number}}</td>
                <td scope="col">{{ $address->is_main}}</td>
                <td scope="col">{{ $address->area_id }}</td>
                <td scope="col">{{ $address->user_id}}</td>
                <td scope="col">{{ $address->created_at }}</td>
                <td><a href="{{route('addresses.show',['address'=>$address['id']])}}" class="btn btn-primary btn-sm">  <i class="fas fa-folder">
                </i> View</a></td>
              <td><a href="{{route('addresses.edit',['address'=>$address['id']])}}" class="btn btn-info btn-sm"> <i class="fas fa-pencil-alt">
              </i> Edit</a></td> 
              <td> 
                  <form method="POST" action="{{route('addresses.destroy',['address'=>$address['id']])}}">
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