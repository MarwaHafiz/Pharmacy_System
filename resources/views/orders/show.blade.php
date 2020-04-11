@extends('admin_layouts.admin')
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Order Data</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Order Data</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h2 class="card-text">Order {{ $order->id }} Information</h2>
        <div class="card-body">
        <br>
    <h5 class="card-text">Medicine Name:- {{$order->medicine->name}}</h5>
    <h5 class="card-text">Username:- {{$order->order->user->name}}</h5>
    <h5 class="card-text">Address:- {{$order->order->delivering_address }}</h5>
    <h5 class="card-text">Quantity:- {{ $order->quantity }}</h5>
    <h5 class="card-text">Total Price:- {{ $order->order->total_price }}</h5>
    <h5 class="card-text">Order Status:- {{ $order->order->status->status }}</h5>
    <h5 class="card-text">Action:- {{ $order->order->action }}</h5>
    @if($order->order->is_insured)
    <h5 class="card-text">Insurance:- Yes</h5>
                @else
    <h5 class="card-text">Insurance:- No</h5>
                @endif
  </div>
</div>

@endsection