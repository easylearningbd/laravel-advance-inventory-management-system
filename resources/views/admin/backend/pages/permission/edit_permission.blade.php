@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Edit Permission</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    
                    <li class="breadcrumb-item active">Edit Permission</li>
                </ol>
            </div>
        </div>

        <!-- Form Validation -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Edit Permission</h5>
                    </div><!-- end card header -->

<div class="card-body">
    <form action="{{ route('update.permission') }}" method="post" class="row g-3" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $permissions->id }}">

        <div class="col-md-6">
            <label for="validationDefault01" class="form-label">Permission Name</label>
            <input type="text" class="form-control" name="name" value="{{ $permissions->name }}"  > 
        </div>

        <div class="col-md-6">
            <label for="validationDefault01" class="form-label">Permission Group</label>
            <select name="group_name" class="form-select" id="example-select">
                <option value="" selected>Select Group</option>
                <option value="Brand" {{ $permissions->group_name == 'Brand' ? 'selected' : '' }}>Brand</option>
                <option value="WareHouse" {{ $permissions->group_name == 'WareHouse' ? 'selected' : '' }}>WareHouse</option>
                <option value="Supplier" {{ $permissions->group_name == 'Supplier' ? 'selected' : '' }}>Supplier</option>
                <option value="Customer" {{ $permissions->group_name == 'Customer' ? 'selected' : '' }}>Customer</option>
                <option value="Product" {{ $permissions->group_name == 'Product' ? 'selected' : '' }}>Product</option>
                <option value="Purchase" {{ $permissions->group_name == 'Purchase' ? 'selected' : '' }}>Purchase</option>
                <option value="Sale" {{ $permissions->group_name == 'Sale' ? 'selected' : '' }}>Sale</option>
                <option value="Due" {{ $permissions->group_name == 'Due' ? 'selected' : '' }}>Due</option>
                <option value="Transfers" {{ $permissions->group_name == 'Transfers' ? 'selected' : '' }}>Transfers</option>
                <option value="Report" {{ $permissions->group_name == 'Report' ? 'selected' : '' }}>Report</option>
                 
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