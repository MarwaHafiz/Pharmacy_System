@extends('admin_layouts.admin')
@section('content')

<div class="d-flex align-content-stretch flex-wrap" style="text-align:center">
    <div class="container " style="text-align:center">
        <br>
        <center>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <div class="card-header"  style="color:red;">
                      <h5> Street-Name: {{ $address->street_name }} </h5>
                    </div>
                    <p class="card-text"> Building_Number: {{ $address->building_number }}</p>
                    <p class="card-text"> Floor_Number: {{ $address->floor_number }}</p>
                    <p class="card-text"> Flat_Number: {{ $address->flat_number }}</p>
                    <p class="card-text">Is_Main: {{ $address->is_main}}</p>
                    <p class="card-text"> Area_Name: {{ $address->area->name }}</p>
                    <p class="card-text"> User_Name: {{ $address->user->name}}</p>
                    <a href="{{route('addresses.index')}}" class="btn btn-primary">Back to table</a>
                </div>
            </div>
        </center>
    </div>

</div>

  @endsection