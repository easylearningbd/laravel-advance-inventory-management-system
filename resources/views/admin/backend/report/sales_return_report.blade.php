@extends('admin.admin_master')
@section('admin')

<div class="page-content m-2">
    <div class="container">
         @include('admin.backend.report.body.report_top')
    </div>
     {{-- /// end Container  --}}

     <div class="card">

        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
      @include('admin.backend.report.body.report_menu')
</div>

 

            </div> 
        </nav> 

    <div class="card-body">
        <div class="table-responsive">
            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
        <div class="col-sm-12">
            <table id="example" class="table table-striped table-bordered dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
                <thead>
                    <tr role="row">
                        <th>ID</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Warehouse</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Unti Price</th>
                        <th>Status</th>
                        <th>Grand Total</th> 
                    </tr>
                </thead>
            <tbody>
            @foreach ($returnSales as $key=> $sales) 
            @foreach ($sales->saleReturnItems as $item) 
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $sales->date }}</td>
                    <td>{{ $sales->customer->name ?? 'N/A' }}</td>
                    <td>{{ $sales->warehouse->name ?? 'N/A' }}</td>
                    <td>{{ $item->product->name ?? 'N/A'}}</td>
                    <td>{{ $item->quantity ?? 'N/A'}}</td>
                    <td>{{ $item->net_unit_cost ?? 'N/A'}}</td>
                    <td>{{ $sales->status ?? 'N/A' }}</td>
                    <td>{{ $sales->grand_total ?? 'N/A' }}</td> 
                </tr>
                @endforeach
                @endforeach
            </tbody>

            </table>

        </div>

    </div>

</div>

        </div>
    </div>





     </div>
     {{-- /// End Card --}} 

</div> 

 
 
@endsection