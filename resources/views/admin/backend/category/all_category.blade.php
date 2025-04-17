@extends('admin.admin_master')
@section('admin')

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">All Product Category</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                     <a href="{{ route('add.customer') }}" class="btn btn-secondary">Add Category</a>
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
            <th>Category Name</th>
            <th>Category Slug</th>  
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
           @foreach ($category as $key=> $item) 
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->category_name }}</td>
                <td>{{ $item->category_slug }}</td> 
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