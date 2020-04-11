@extends('admin_layouts.admin')
@section('content')

<div class="d-flex align-content-stretch flex-wrap" style="text-align:center">
    <div class="container " style="text-align:center">
        <br>

        <form method="POST" action='{{$action}}' enctype="multipart/form-data"> 
                @if(isset($address))
                    @method('PUT')
                @endif 
            @csrf
            <div class="form-row"> 
                <div class="form-group col-md-6">
                    <label for="examplestreet_name">Street_Name</label>
                    @if(isset($address))
                        <input  name="street_name" type="text" class="form-control" id="examplestreet_name" placeholder="street_name" value="{{ $address->street_name }}" required>
                    @else
                        <input  name="street_name" type="text" class="form-control" id="examplestreet_name"  placeholder="street_name" required>
                    @endif

                    @error('street_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="examplebuilding_number">building_number</label>
                    @if(isset($address))
                        <input name="building_number" type="text" class="form-control" id="examplebuilding_number" placeholder="building_number"  value="{{ $address->building_number }}" required>
                    @else
                        <input name="building_number" type="text" class="form-control" id="examplebuilding_number" placeholder="building_number" required>
                    @endif
                    @error('building_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row"> 
                <div class="form-group col-md-6">
                    <label for="examplefloor_number">Floor_Number</label>
                    @if(isset($address))
                        <input  name="floor_number" type="text" class="form-control" id="examplefloor_number" placeholder="Floor_Number" value="{{ $address->floor_number }}" required>
                    @else
                        <input  name="floor_number" type="text" class="form-control" id="examplefloor_number" placeholder="Floor_Number" required>
                    @endif

                    @error('floor_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleflat_number">flat_number</label>
                    @if(isset($address))
                        <input  name="flat_number" type="text" class="form-control" id="exampleflat_number"  value="{{ $address->flat_number }}" placeholder="flat_number" required>
                    @else
                        <input  name="flat_number" type="text" class="form-control" id="exampleflat_number"  placeholder="flat_number" required>
                    @endif

                    @error('flat_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row"> 
                <div class="form-group col-md-6">
                    <label for="exampleis_main">is_main</label>
                    @if(isset($address))
                        <input  name="is_main" type="text" class="form-control" id="exampleis_main"  value="{{ $address->is_main }}" placeholder="0 or 1" required>
                    @else
                        <input  name="is_main" type="text" class="form-control" id="exampleis_main"  placeholder="is_main" required>
                    @endif

                    @error('is_main')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                <label for="exampleFormControlTextarea1">User</label>
                    <select name="user_id" class="form-control" required>
                   
                        @if(isset($address))
                            <option value="{{$address->user->id}}">{{$address->user->name}}</option>
                            @foreach ($users as $user)
                                @if ($user->name === $address->user->name )
                                    <option value="{{$user->id}}" hidden> {{$user->name}}</option>
                                @else
                                    <option value="{{$user->id}}"> {{$user->name}}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        @endif
                   
                    </select>
                    @error('user_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="exampleFormControlTextarea1">User</label>
                    <select name="area_id" class="form-control" required>
                   
                        @if(isset($address))
                            <option value="{{$address->area->id}}">{{$address->area->name}}</option>
                            @foreach ($areas as $area)
                                @if ($area->name === $address->area->name )
                                    <option value="{{$area->id}}" hidden> {{$area->name}}</option>
                                @else
                                    <option value="{{$area->id}}"> {{$area->name}}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach ($areas as $area)
                                <option value="{{$area->id}}">{{$area->name}}</option>
                            @endforeach
                        @endif
                   
                    </select>
                    @error('area_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>

            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection