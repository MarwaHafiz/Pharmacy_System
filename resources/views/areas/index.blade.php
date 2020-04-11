@extends('admin_layouts.admin')
@section('content')

<div class="d-flex align-content-stretch flex-wrap" style="text-align:center">
    <div class="container " style="text-align:center">
        <br>
      
  <a href="{{route('areas.create')}}"  class="btn btn-success mb-5" style="align-center" >Add New Area</a></div>
      <table class="table table-bordered table-hover table-dark" class="mx-auto" style="background-color: 	rgb(52, 57, 64)">
        <thead class="thead-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Address</th>
              <th scope="col"></th>
              <th scope="col">Actions</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($areas as $area)
            <tr>
            <th scope="row">{{ $area->id }}</th>
              <td>{{ $area->name }} </td>
              <td>{{$area->address}}</td>
            
              <td><a href="{{route('areas.show',['area' => $area->id])}}" class="btn btn-primary btn-sm">  <i class="fas fa-folder">
            </i> View</a></td>
              <td><a href="{{route('areas.edit',['area' => $area->id])}}" class="btn btn-info btn-sm"> <i class="fas fa-pencil-alt">
            </i> Edit</a></td> 
              <td>    
              <form method="POST" action="{{route('areas.destroy',['area' => $area->id])}}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger" onclick="return confirm('Do you really want to delete this area?')" role="button" aria-pressed="true">Delete</a>
                </form>
             </td> 
      
          @endforeach
          </tbody>
        </table> 
      
  </div>

  @endsection