@extends('admin.admin_master')
@section('admin')

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">All Return Sales</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                     <a href="{{ route('add.sale.return') }}" class="btn btn-secondary">Add Return Sales</a>
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
            <th>Status</th> 
            <th>Grand Total</th> 
            <th>Paid Amount</th>
            <th>Due Amount</th>
            <th>Created</th> 
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
    @foreach ($allData as $key=> $item) 
    <tr>
        <td>{{ $key+1 }}</td> 
        <td>{{ $item['warehouse']['name'] }}</td>
        <td>{{ $item->status }}</td>
        <td>${{ $item->grand_total }}</td> 
        <td> <h4> <span class="badge text-bg-info">${{ $item->paid_amount }} </span> </h4> </td>
        <td> <h4> <span class="badge text-bg-secondary">${{ $item->due_amount }} </span> </h4> </td>
        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}</td>
        <td>
   <a title="Details" href="{{ route('details.sale.return',$item->id) }}" class="btn btn-info btn-sm"> <span class="mdi mdi-eye-circle mdi-18px"></span> </a> 

   <a title="PDF Invoice" href="{{ route('invoice.sale',$item->id) }}" class="btn btn-primary btn-sm"> <span class="mdi mdi-download-circle mdi-18px"></span> </a> 

    <a title="Edit" href="{{ route('edit.sale.return',$item->id) }}" class="btn btn-success btn-sm"> <span class="mdi mdi-book-edit mdi-18px"></span> </a>  

    <a title="Delete" href="{{ route('delete.sale.return',$item->id) }}" class="btn btn-danger btn-sm" id="delete"><span class="mdi mdi-delete-circle  mdi-18px"></span></a>    
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