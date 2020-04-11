@extends('admin_layouts.admin')
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" >Adding a new Order</a>
</nav>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div>
<div class="container">
        <form method="post" action="{{route('orders.store')}}"> 
        @csrf
        <div class="medicine"  id="inputFormRow">
            <div class="row form-group">
                <div class="col-md-12">
                    <label for="medicine">medicine</label>
                    <a id="addRow" class=""><i class="fas fa-plus"></i></a>
                    <input name="name[]" type="text" class="form-control" >
                </div>
            </div>
            <div class="form-group">
                <label for="quantity">quantity</label>
                <input name="quantity[]" type="number" class="form-control" >
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input name="type[]" type="text" class="form-control" >
            </div>
            <div class="form-group">
                <label for="price">price</label>
                <input name="price[]"  type="number" class="form-control" id="price">
            </div>
        </div>
        <div id="newRow"></div>
        

        
        <div class="form-group">
            <label for="total_price">total price</label>
            <!-- <input class="form-control" value="{{$total_price}}" type="text" placeholder="Readonly input here…" readonly> -->
            <input name="total_price"  type="number" class="form-control">
        </div>
        <div class="form-group">
            <label for="delivering_address">delivering address</label>
            <input name="delivering_address" type="text" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="action">action</label>
            <input name="action" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="is_insured">is_insured</label>
            <select class="form-control" name="is_insured">
                <option value="1">yes</option>
                <option value="0">no</option>
            </select>
            
        </div>
        <div class="form-group">
            <label for="user">User</label>

            <select class="form-control" name="user_id">
            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        
        
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script type="text/javascript">
    // add row
    $("#addRow").click(function () {
        var html = '';
        html +='<div class="medicine"  id="inputFormRow">';
        html += '<div class="row form-group">';
        html += '<div class="col-md-12">';
        html += '<label for="medicine">medicine</label>';
        html += '<a id="removeRow" type="button" class=""><i class="fas fa-minus"></i></a>';
        html += '<input name="name[]" type="text" class="form-control" >';     
        html += '</div>';
        html += '</div>';
        html += '<div class="form-group">';
        html += '<label for="quantity">quantity</label>';
        html += '<input name="quantity[]" type="number" class="form-control" >';
        html += '</div>';
        html += '<div class="form-group">';
        html += '<label for="type">Type</label>';
        html += '<input name="type[]" type="text" class="form-control" >';
        html += '</div>';
        html += '<div class="form-group">';
        html += '<label for="price">price</label>';
        html += '<input name="price[]"  type="number" class="form-control">';
        html += '</div>';
        html += '</div>';
        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });
    // $("#price").keyup(function(){
    //     $("#price");
    // });
</script>
@endsection