@extends('admin_layouts.admin')
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Medicine Data</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Medicine Data</li>
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
        <h2 class="card-text">Medicine {{ $medicine->id }} Information</h2>
        <div class="card-body">
        <br>
    <h5 class="card-text">Name:- {{ $medicine->name }}</h5>
    <h5 class="card-text">Quantity:- {{ $medicine->quantity }}</h5>
    <h5 class="card-text">Type:- {{ $medicine->type }}</h5>
    <h5 class="card-text">Price: <?php echo number_format(($medicine->price/100), 2, '.', ' ')?>
</h5>
  </div>
</div>

@endsection