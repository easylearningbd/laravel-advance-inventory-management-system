@extends('admin.admin_master')
@section('admin')

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">All Customer</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                     <a href="{{ route('add.customer') }}" class="btn btn-secondary">Add Customer</a>
                </ol>
            </div>
        </div>

        <!-- Datatables  -->
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                         
                    </div><!-- end card header -->

<div class="card-body">
    <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
        <thead>
        <tr>
            <th>Sl</th>
            <th>Customer Name</th>
            <th>Email</th> 
            <th>Phone</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
           @foreach ($customer as $key=> $item) 
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ Str::limit($item->address, 50, '...')  }}</td>
                <td>
            <a href="{{ route('edit.customer',$item->id) }}" class="btn btn-success btn-sm">Edit</a>  
            <a href="{{ route('delete.customer',$item->id) }}" class="btn btn-danger btn-sm" id="delete">Delete</a>    
                </td> 
            </tr>
            @endforeach 
                
        </tbody>
    </table>
</div>

                </div>
            </div>
        </div>


     

    </div> <!-- container-fluid -->

</div> <!-- content -->



@endsection