@extends('admin.admin_master')
@section('admin')

<div class="page-content m-2">
    <div class="container">
        <div class="row">

<div class="col-md-4 col-lg-4">
    <div class="card mb-3" style="max-width: 400px; background-color:aquamarine">
        <div class="row g-0">
            <div class="col-4 d-flex align-items-center justify-content-center" style="height: 100px;">
                <span class="mdi mdi-adjust mdi-18px"></span> 
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="fs-16 mb-0 me-2 fw-semibold text-black">Purchase</h2>
                    <p class="fs-22 mb-0 me-2 fw-semibold text-black">
                        <strong class="text-muted">{{ \App\Models\Purchase::count() }}</strong>
                    </p> 
                </div> 
            </div> 
        </div> 
    </div> 
</div>


<div class="col-md-4 col-lg-4">
    <div class="card mb-3" style="max-width: 400px; background-color:rgb(249, 201, 80)">
        <div class="row g-0">
            <div class="col-4 d-flex align-items-center justify-content-center" style="height: 100px;">
                <span class="mdi mdi-account-wrench mdi-18px"></span> 
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="fs-16 mb-0 me-2 fw-semibold text-black">Purchase Return</h2>
                    <p class="fs-22 mb-0 me-2 fw-semibold text-black">
                        <strong class="text-muted">{{ \App\Models\ReturnPurchase::count() }}</strong>
                    </p> 
                </div> 
            </div> 
        </div> 
    </div> 
</div>



<div class="col-md-4 col-lg-4">
    <div class="card mb-3" style="max-width: 400px; background-color:rgb(56, 245, 69)">
        <div class="row g-0">
            <div class="col-4 d-flex align-items-center justify-content-center" style="height: 100px;">
                <span class="mdi mdi-account-box-multiple-outline mdi-18px"></span> 
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="fs-16 mb-0 me-2 fw-semibold text-black">Stock </h2>
                    <p class="fs-22 mb-0 me-2 fw-semibold text-black">
                        <strong class="text-muted">{{ \App\Models\Product::count() }}</strong>
                    </p> 
                </div> 
            </div> 
        </div> 
    </div> 
</div>



<div class="col-md-4 col-lg-4">
    <div class="card mb-3" style="max-width: 400px; background-color:rgb(17, 152, 255)">
        <div class="row g-0">
            <div class="col-4 d-flex align-items-center justify-content-center" style="height: 100px;">
                <span class="mdi mdi-account-eye mdi-18px"></span> 
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="fs-16 mb-0 me-2 fw-semibold text-black">Sales </h2>
                    <p class="fs-22 mb-0 me-2 fw-semibold text-black">
                        <strong class="text-muted">{{ \App\Models\Sale::count() }}</strong>
                    </p> 
                </div> 
            </div> 
        </div> 
    </div> 
</div>


<div class="col-md-4 col-lg-4">
    <div class="card mb-3" style="max-width: 400px; background-color:rgb(220, 52, 246)">
        <div class="row g-0">
            <div class="col-4 d-flex align-items-center justify-content-center" style="height: 100px;">
                <span class="mdi mdi-account-reactivate mdi-18px"></span> 
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="fs-16 mb-0 me-2 fw-semibold text-black">Sales Return</h2>
                    <p class="fs-22 mb-0 me-2 fw-semibold text-black">
                        <strong class="text-muted">{{ \App\Models\SaleReturn::count() }}</strong>
                    </p> 
                </div> 
            </div> 
        </div> 
    </div> 
</div>
 

        </div> 
    </div>
     {{-- /// end Container  --}}

     <div class="card">

        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="{{ route('all.report') }}" class="nav-link active" aria-current="page">Purchase</a> 
        </li>
        <li class="nav-item">
            <a href="{{ route('purchase.return.report') }}" class="nav-link purchase-return-tab" >Purchase Return</a> 
        </li>

        <li class="nav-item">
            <a href="" class="nav-link" >Sale</a> 
        </li>
        <li class="nav-item">
            <a href="" class="nav-link" >Sale Return</a> 
        </li>

        <li class="nav-item">
            <a href="" class="nav-link" >Stock</a> 
        </li>

    </ul>     
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