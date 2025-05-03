@extends('admin.admin_master')
@section('admin')

<div class="content d-flex flex-column flex-column-fluid">
   <div class="d-flex flex-column-fluid">
      <div class="container-fluid my-4">
         <div class="d-md-flex align-items-center justify-content-between">
            <h3 class="mb-0"> Purchase Details</h3>
            <div class="text-end my-2 mt-md-0"><a class="btn btn-outline-primary" href="{{ route('all.purchase') }}">Back</a></div>
         </div>
         

 <div class="card">
    <div class="card-body">
    <div class="row">

        {{-- supplier info --}}
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0 h-100" style="border-radius: 10px; transition: 0.2s">
                <div class="card-header text-white text-center" style="background: linear-gradient(135deg, #17a2b8, #0d6efd); border-radius:10px 10px 0 0;">
                    <h5 class="mb-0 fw-bold">Supplier Information</h5> 
                </div>
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-3">
                    <strong class="me-2 text-muted">Name:</strong>
                    <span>{{ $purchase->supplier->name }}</span> 
                </div>
                <div class="d-flex align-items-center mb-3">
                    <strong class="me-2 text-muted">Email:</strong>
                    <span>{{ $purchase->supplier->email }}</span> 
                </div>
                <div class="d-flex align-items-center mb-3">
                    <strong class="me-2 text-muted">Phone:</strong>
                    <span>{{ $purchase->supplier->phone }}</span> 
                </div> 
            </div>

            </div> 
        </div>
        {{-- End supplier info --}}


 {{-- Company warehosue info --}}
 <div class="col-md-4 mb-4">
    <div class="card shadow-sm border-0 h-100" style="border-radius: 10px; transition: 0.2s">
        <div class="card-header text-white text-center" style="background: linear-gradient(135deg, #17a2b8, #0d6efd); border-radius:10px 10px 0 0;">
            <h5 class="mb-0 fw-bold">Warehouse Information</h5> 
        </div>
    <div class="card-body p-4">
        <div class="d-flex align-items-center mb-3">
            <strong class="me-2 text-muted">Warehouse:</strong>
            <span>{{ $purchase->warehouse->name }}</span> 
        </div>
         
    </div>

    </div> 
</div>
{{-- End Company warehosue info --}}


  {{-- Purchase info --}}
  <div class="col-md-4 mb-4">
    <div class="card shadow-sm border-0 h-100" style="border-radius: 10px; transition: 0.2s">
        <div class="card-header text-white text-center" style="background: linear-gradient(135deg, #17a2b8, #0d6efd); border-radius:10px 10px 0 0;">
            <h5 class="mb-0 fw-bold">Purchase Information</h5> 
        </div>
    <div class="card-body p-4">
        <div class="d-flex align-items-center mb-3">
            <strong class="me-2 text-muted">Purchase Date:</strong>
            <span>{{ $purchase->date }}</span> 
        </div>
        <div class="d-flex align-items-center mb-3">
            <strong class="me-2 text-muted">Status:</strong>
            <span>{{ $purchase->status }}</span> 
        </div>
        <div class="d-flex align-items-center mb-3">
            <strong class="me-2 text-muted">Grand Total:</strong>
            <span>{{ number_format($purchase->grand_total, 2)  }}</span> 
        </div> 
    </div>

    </div> 
</div>
{{-- End Purchase info --}}



    </div>
 

   
            </div>
         </div>
      </div>
   </div>
</div>
 
@endsection