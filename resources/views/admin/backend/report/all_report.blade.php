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
            <a href="" class="nav-link active" aria-current="page">Purchase</a> 
        </li>
        <li class="nav-item">
            <a href="" class="nav-link purchase-return-tab" >Purchase Return</a> 
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

{{-- /// Date rang filter  --}}
<div class="row">
    <div class="col-md-12 d-flex align-items-center position-relative">
        <select id="date-range" class="form-control large-select">
            <option value="" selected disabled>Select Date Range</option>
            <option value="today">Today</option>
            <option value="this_week">This Week</option>
            <option value="last_week">Last Week</option>
            <option value="this_month">This Month</option>
            <option value="last_month">Last Month</option>
            <option value="custom">Custom Range</option> 
        </select>
        <span class="mdi mdi-filter-menu"></span> 
    </div>

    {{-- // Custom date field  --}}
    <div class="dropdown-menu p-3 custom-dropdown position-absolute shadow bg-white">
        <label for="custom-start-date">Start Date:</label>
        <input type="date" id="custom-start-date" class="form-control mb-2">

        <label for="custom-end-date">End Date:</label>
        <input type="date" id="custom-end-date" class="form-control mb-2">

        <button id="apply-filter" class="btn btn-primary w-100">Apply</button> 
    </div> 
</div>
{{-- /// End Date rang filter  --}} 


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
                        <th>Supplier</th>
                        <th>Warehouse</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Unti Price</th>
                        <th>Status</th>
                        <th>Grand Total</th> 
                    </tr>
                </thead>
            <tbody>
            @foreach ($purchases as $key=> $purchase) 
            @foreach ($purchase->purchaseItems as $item) 
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $purchase->date }}</td>
                    <td>{{ $purchase->supplier->name ?? 'N/A' }}</td>
                    <td>{{ $purchase->warehouse->name ?? 'N/A' }}</td>
                    <td>{{ $item->product->name ?? 'N/A'}}</td>
                    <td>{{ $item->quantity ?? 'N/A'}}</td>
                    <td>{{ $item->net_unit_cost ?? 'N/A'}}</td>
                    <td>{{ $purchase->status ?? 'N/A' }}</td>
                    <td>{{ $purchase->grand_total ?? 'N/A' }}</td> 
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