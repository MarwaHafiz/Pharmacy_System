@extends('admin_layouts.admin')
@section('content')

<div class="d-flex align-content-stretch flex-wrap" style="text-align:center">
    <div class="container " style="text-align:center">
        <br>
      
  <a href="{{route('medicines.create')}}"  class="btn btn-success mb-5" style="align-center" >Add New Medicine</a></div>
      <table class="table table-bordered table-hover table-dark" class="mx-auto" style="background-color: 	rgb(52, 57, 64)">
        <thead class="thead-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Quantity</th>
              <th scope="col">Type</th>
              <th scope="col">Price</th>
              <th scope="col"></th>
              <th scope="col">Actions</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($medicines as $medicine)
            <tr>
            <th scope="row">{{ $medicine->id }}</th>
              <td>{{ $medicine->name }} </td>
              <td>{{$medicine->quantity}}</td>
              <td>{{ $medicine->type}}</td>
             
             <td>
             <?php echo number_format(($medicine->price/100), 2, '.', ' ')?>
             </td>
            
            
              <td><a href="{{route('medicines.show',['medicine' => $medicine->id])}}" class="btn btn-primary btn-sm">  <i class="fas fa-folder">
            </i> View</a></td>
              <td><a href="{{route('medicines.edit',['medicine' => $medicine->id])}}" class="btn btn-info btn-sm"> <i class="fas fa-pencil-alt">
            </i> Edit</a></td> 
              <td>    
              <form method="POST" action="{{route('medicines.destroy',['medicine' => $medicine->id])}}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger" onclick="return confirm('Do you really want to delete this medicine?')" role="button" aria-pressed="true">Delete</a>
                </form>
             </td> 
      
          @endforeach
          </tbody>
        </table> 
      
  </div>

  @endsection