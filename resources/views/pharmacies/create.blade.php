@extends('admin_layouts.admin')
@section('content')
<div class="d-flex align-content-stretch flex-wrap" style="text-align:center">
    <div class="container " style="text-align:center">

        <h3>Creating New Pharmacy</h3>
        <hr>
        <form method="POST" action="{{route('pharmacies.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationDefault01">created_at</label>
                <input name="created_at" type="text" class="form-control" id="validationDefault01" value="Mark" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="validationDefault02">Name</label>
                <input name="name" type="text" class="form-control" id="validationDefault02" value="Otto" required>
              </div>
         
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="validationDefault01">Email</label>
                  <input name="email" type="text" class="form-control" id="validationDefault01" value="Mark" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="validationDefault02">Password</label>
                  <input name="password" type="text" class="form-control" id="validationDefault02" value="Otto" required>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="validationDefault01">National_id</label>
                      <input name="national_id" type="text" class="form-control" id="validationDefault01" value="Mark" required>
                    </div>

                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="validationDefault01">revenue</label>
                        <input name="revenue" type="text" class="form-control" id="validationDefault01" value="Mark" required>
                      </div>

                    <div class="col-md-6 mb-3">
                     <label for="exampleFormControlFile1">Image</label>
                     <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
                     </div>

                    
                    <div >
                          <label for="validationDefault01">Area_Id</label>
                          <input name="area_id" type="text" class="form-control" id="validationDefault01" value="Mark" required>
                        </div>
                        <div class="row">
                         <button class="btn btn-primary" type="submit">Create</button>
                        </div>
          </form>
    </div>
</div>
@endsection


{{-- {{ storage_public('path', $model->image) }}  --}}


