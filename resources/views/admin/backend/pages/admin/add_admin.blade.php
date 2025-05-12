@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Add Admin</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    
                    <li class="breadcrumb-item active">Add Admin</li>
                </ol>
            </div>
        </div>

        <!-- Form Validation -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Add Admin</h5>
                    </div><!-- end card header -->

<div class="card-body">
    <form action="{{ route('store.admin') }}" method="post" class="row g-3" enctype="multipart/form-data">
        @csrf

        <div class="col-md-6">
            <label for="validationDefault01" class="form-label">Admin Name</label>
            <input type="text" class="form-control" name="name"  >  
        </div>

          <div class="col-md-6">
            <label for="validationDefault01" class="form-label">Admin Email</label>
            <input type="emal" class="form-control" name="email"  >  
        </div>

          <div class="col-md-6">
            <label for="validationDefault01" class="form-label">Admin Password</label>
            <input type="password" class="form-control" name="password"  >  
        </div>

          <div class="col-md-6">
            <label for="validationDefault01" class="form-label">Role </label>
            <select name="roles" class="form-select" id="example-select">
                <option value="" selected>Select Role</option>
                 @foreach ($roles as $role) 
                <option value="{{ $role->id }}">{{ $role->name }}</option> 
                  @endforeach
            </select>
        </div>
 
 
            
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Save Change</button>
        </div>
    </form>
</div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col -->

          
        </div>

        

    </div> <!-- container-fluid -->

</div>
 

@endsection