@extends('admin_layouts.admin')
@section('content')

<div class="d-flex align-content-stretch flex-wrap" style="text-align:center">
    <div class="container " style="text-align:center">
        <br>
      
      <table class="table table-bordered table-hover table-dark" class="mx-auto" style="background-color: 	rgb(52, 57, 64)" id="doctor_table">
        <thead class="thead-light">
            <tr>
              {{-- <th scope="col">Created at</th> --}}
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              {{-- <th scope="col">Password</th> --}}
              <th scope="col">National Id</th>
              <th scope="col">Revenue</th>
               <th scope="col">Profil</th>
               <th scope="col">Area Id</th>
               <h3><th scope="col">Actions</th> </h3>
               <th scope="col"></th>
               <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <div>
            <h1 style="display: inline;">Dream System</h1>
            <a href="{{route('pharmacies.create')}}" class="btn btn-outline-success mb-4" style="margin-left: 300px">Create Pharmacy</a>
          </div>
            @foreach($pharmacies as $pharmacy)
            <tr>
              {{-- <th>{{$pharmacy->created_at}}</th> --}}
              <td>{{$pharmacy->name}}</td>
              <td>{{ $pharmacy->email }}</td>
              {{-- <td>{{$pharmacy->password}}</td> --}}
               <td>{{ $pharmacy->national_id}}</td>
              <td>{{$pharmacy->revenue}}</td>
              <td><img src="{{asset('uploads/pharmacies/'.$pharmacy->image)}}" width="90px" height="90px"></td>
              <td>{{$pharmacy->area_id}}</td>

               <td><a href="{{route('pharmacies.show',['pharmacy' => $pharmacy->id])}}"  class="btn btn-outline-primary >  <i class="fas fa-folder">
              </i> View</a></td>
                <td><a href="{{route('pharmacies.edit',['pharmacy' => $pharmacy->id])}}" class=" btn-outline-warning" > <i class="fas fa-pencil-alt">
              </i> Edit</a></td>
              <td> 
                  <form method="POST" action="{{route('pharmacies.destroy',['pharmacy' => $pharmacy->id])}}" >
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this pharmacy?')"><i class="fas fa-trash-alt">
                      </i> Delete</button>
                  </form>
              </td>
  
         
           
              </td>
            </div>
            @endforeach
        
          </tbody>
        </table>
        
        </div>

    </div>
</div>

@endsection















