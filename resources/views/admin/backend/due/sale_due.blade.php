@extends('admin.admin_master')
@section('admin')

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">All Sales Dues</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    
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
            <th>WareHouse</th>
            <th>Customer Name</th> 
            <th>Due Amount</th> 
            <th>Full Payment</th> 
        </tr>
        </thead>
        <tbody>
    @foreach ($sales as $key=> $item) 
    <tr>
        <td>{{ $key+1 }}</td> 
        <td>{{ $item['warehouse']['name'] }}</td>
        <td>{{ $item['customer']['name'] }}</td>
        <td><h4> <span class="badge text-bg-secondary">${{ $item->due_amount }} </span> </h4> </td>  
        <td>

   <a title="Pay Now" href="{{ route('edit.sale',$item->id) }}" class="btn btn-info btn-sm"> Pay Now  </a> 
 
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