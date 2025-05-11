@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Add Permission</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    
                    <li class="breadcrumb-item active">Add Permission</li>
                </ol>
            </div>
        </div>

        <!-- Form Validation -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Add Permission</h5>
                    </div><!-- end card header -->

<div class="card-body">
    <form action="{{ route('store.permission') }}" method="post" class="row g-3" enctype="multipart/form-data">
        @csrf

        <div class="col-md-6">
            <label for="validationDefault01" class="form-label">Permission Name</label>
            <input type="text" class="form-control" name="name"  > 
        </div>

        <div class="col-md-6">
            <label for="validationDefault01" class="form-label">Permission Group</label>
            <select name="group_name" class="form-select" id="example-select">
                <option value="" selected>Select Group</option>
                <option value="Brand">Brand</option>
                <option value="WareHouse">WareHouse</option>
                <option value="Supplier">Supplier</option>
                <option value="Customer">Customer</option>
                <option value="Product">Product</option>
                <option value="Purchase">Purchase</option>
                <option value="Sale">Sale</option>
                <option value="Due">Due</option>
                <option value="Transfers">Transfers</option>
                <option value="Report">Report</option>
                 
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