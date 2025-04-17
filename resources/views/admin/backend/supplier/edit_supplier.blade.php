@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Edit Supplier</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    
                    <li class="breadcrumb-item active">Edit Supplier</li>
                </ol>
            </div>
        </div>

        <!-- Form Validation -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Edit Supplier</h5>
                    </div><!-- end card header -->

<div class="card-body">
    <form id="myForm" action="{{ route('update.supplier') }}" method="post" class="row g-3" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $supplier->id }}">

        <div class="form-group col-md-4">
            <label for="validationDefault01" class="form-label">Supplier Name</label>
            <input type="text" class="form-control" name="name" value="{{ $supplier->name }}"  > 
        </div>

        <div class="form-group col-md-4">
            <label for="validationDefault01" class="form-label">Supplier Email</label>
            <input type="text" class="form-control" name="email"  value="{{ $supplier->email }}" > 
        </div>

        <div class="col-md-4">
            <label for="validationDefault01" class="form-label">Supplier Phone</label>
            <input type="text" class="form-control" name="phone"  value="{{ $supplier->phone }}" > 
        </div>

        <div class="form-group col-md-12">
            <label for="validationDefault01" class="form-label">Supplier Address</label>
    <textarea name="address" class="form-control">{{ $supplier->address }}</textarea>
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

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                },
                email: {
                    required : true,
                },
                address: {
                    required : true,
                }, 
                
            },
            messages :{
                name: {
                    required : 'Please Enter Supplier Name',
                },
                email: {
                    required : 'Please Enter Supplier Email',
                }, 
                address: {
                    required : 'Please Enter Supplier address',
                }, 

            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>
 

@endsection