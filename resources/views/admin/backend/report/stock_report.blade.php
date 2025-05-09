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
                        <th>Sl</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Warehouse </th>
                        <th>Stock Quantity</th> 
                    </tr>
                </thead>
            <tbody>
            @foreach ($products as $key=> $item)  
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->category_name ?? 'N/A' }}</td>
                    <td>{{ $item->warehouse->name ?? 'N/A' }}</td> 
                    <td><h4> <span class="badge text-bg-secondary"> {{ $item->product_qty ?? 'N/A'}} </span> </h4>  </td> 
                </tr> 
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