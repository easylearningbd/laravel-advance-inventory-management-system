@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Add Customer</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    
                    <li class="breadcrumb-item active">Add Customer</li>
                </ol>
            </div>
        </div>

        <!-- Form Validation -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Add Customer</h5>
                    </div><!-- end card header -->

<div class="card-body">
    <form id="myForm" action="{{ route('store.customer') }}" method="post" class="row g-3" enctype="multipart/form-data">
        @csrf

        <div class="form-group col-md-4">
            <label for="validationDefault01" class="form-label">Customer Name</label>
            <input type="text" class="form-control" name="name"  > 
        </div>

        <div class="form-group col-md-4">
            <label for="validationDefault01" class="form-label">Customer Email</label>
            <input type="text" class="form-control" name="email"  > 
        </div>

        <div class="col-md-4">
            <label for="validationDefault01" class="form-label">Customer Phone</label>
            <input type="text" class="form-control" name="phone"  > 
        </div>

        <div class="form-group col-md-12">
            <label for="validationDefault01" class="form-label">Customer Address</label>
            <textarea name="address" class="form-control"></textarea>
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
                    required : 'Please Enter Customer Name',
                },
                email: {
                    required : 'Please Enter Customer Email',
                }, 
                address: {
                    required : 'Please Enter Customer address',
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