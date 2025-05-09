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