@extends('admin.admin_master')
@section('admin')

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">All Role in Permission</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                     <a href="{{ route('add.roles.permission') }}" class="btn btn-secondary">Add Role in Permission</a>
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
    <table class="table table-bordered dt-responsive table-responsive nowrap">
        <thead>
        <tr>
            <th>Sl</th>
            <th>Role Name</th>
            <th>Permission Name </th>  
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
           @foreach ($roles as $key=> $item) 
            <tr>
                <td>{{ $key+1 }}</td>
                <td style="width: 120px">{{ $item->name }}</td>
                <td> 
                    @foreach ($item->permissions as $prem)
                        <span class="badge bg-danger">{{ $prem->name }}</span>
                    @endforeach
                    </td> 
                <td style="width: 120px">
            <a href="{{ route('admin.edit.roles',$item->id) }}" class="btn btn-success btn-sm">Edit</a>  
            <a href="{{ route('admin.delete.roles',$item->id) }}" class="btn btn-danger btn-sm" id="delete">Delete</a>    
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