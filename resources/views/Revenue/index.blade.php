@extends('admin_layouts.admin')
@section('content')
<div class="d-flex align-content-stretch flex-wrap" style="text-align:center">
    <div class="container " style="text-align:center">
        <br>
       <table class="table table-bordered table-hover table-dark" class="mx-auto" style="background-color: 	rgb(52, 57, 64)">
        <thead class="thead-light">
            <tr>
            <th scope="col">Pharmacy Avatar</th>
            <th scope="col">Pharmacy</th>
            <th scope="col">Total Orders</th>
            <th scope="col">Total Revenue</th>
            
            </tr>
        </thead>
        <tbody>
            @foreach ($pharmacies as $pharmacy)
            <tr>
                
                
                <td>{{$pharmacy->image}}</td>
                <td>{{$pharmacy->name}}</td>
                <td>{{$orders[$i]}}</td>
                <p style="display:none">{{ $i=$i+1}}<p>
                <td>{{$pharmacy->revenue}}</td>
                
                
                    
            </tr>
            @endforeach

        </tbody>
    </table>
    </div>
</div>
@endsection