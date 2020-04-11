@extends('admin_layouts.admin')
@section('content')

<div class="d-flex align-content-stretch flex-wrap" style="text-align:center">
    <div class="container " style="text-align:center">
        <br>

        <form method="POST" action='{{$action}}' enctype="multipart/form-data"> 
                @if(isset($user))
                    @method('PUT')
                @endif 
            @csrf
            <div class="form-row"> 
                <div class="form-group col-md-6">
                    <label for="exampleInputName">User Name</label>
                    @if(isset($user))
                        <input  name="name" type="text" class="form-control" id="exampleInputName"  value="{{ $user->name }}" placeholder="user name">
                    @else
                        <input  name="name" type="text" class="form-control" id="exampleInputName"  placeholder="user name">
                    @endif

                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Email address</label>
                    @if(isset($user))
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1"   value="{{ $user->email }}" placeholder="name@example.com" aria-describedby="emailHelp">
                    @else
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1"  placeholder="name@example.com" aria-describedby="emailHelp">
                    @endif
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row"> 
                <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Password</label>
                    @if(isset($user))
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" value="{{ $user->password }}" placeholder="password">
                    @else
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="password">
                    @endif
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Confirm-Password</label>
                    @if(isset($user))
                        <input  name="confirmPassword" type="password" class="form-control" id="exampleInputPassword1" value="{{ $user->password }}"  placeholder="confirm-password">
                    @else
                        <input  name="confirmPassword" type="password" class="form-control" id="exampleInputPassword1" placeholder="confirm-password">
                    @endif
                    @error('confirmPassword')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="exampleInputName">Mobile Number</label>
                    @if(isset($user))
                        <input name="mobile_number" type="text" class="form-control" id="exampleInputMobileNumber" value="{{ $user->mobile_number }}" placeholder="0XX-XXXXXXXX">
                    @else
                        <input name="mobile_number" type="text" class="form-control" id="exampleInputMobileNumber"  placeholder="0XX-XXXXXXXX">
                    @endif
                    @error('mobile_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="exampleImage"> Profile-Image</label>
                    <br/>
                    <input name="image" type="file" name="image">
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row"> 
                <div class="form-group col-md-6">
                    <label for="exampleDateOfBirth">Date Of Birth</label>
                    @if(isset($user))
                        <input name="date_of_birth" type="text" class="form-control" id="example date_of_birth" value="{{$user->date_of_birth}}" placeholder="day'xx'/month'xx' /year'xxxx'">
                    @else
                        <input name="date_of_birth" type="text" class="form-control" id="example date_of_birth"  placeholder="day'xx'/month'xx' /year'xxxx'">
                    @endif
                    @error('date_of_birth')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleNationalId">National Id</label>
                    @if(isset($user))
                    <input name="national_id" type="text" class="form-control" id="exampleNationalId" value="{{$user->national_id}}" placeholder="name@example.com">
                    @else
                    <input name="national_id" type="text" class="form-control" id="exampleNationalId"  placeholder="name@example.com">
                    @endif
                    @error('national_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group col-md-6">
                <select name="gender" class="form-control col-md-4">
                    <option>gender</option>
                    <option>Female</option>
                    <option>Male</option>
                    <option>Others</option>
                </select>
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection