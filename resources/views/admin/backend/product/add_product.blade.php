@extends('admin.admin_master')
@section('admin')

<div class="content d-flex flex-column flex-column-fluid">
   <div class="d-flex flex-column-fluid">
      <div class="container-fluid my-0">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h2 class="fs-22 fw-semibold m-0">Add Product</h2>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                     <a href="{{ route('all.product') }}" class="btn btn-dark">Back</a>
                </ol>
            </div>
        </div>
         <div class="card">
            <div class="card-body">
<form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
   @csrf
   <div class="row">
      <div class="col-xl-8">
         <div class="card">
            <div class="row">
               <div class="col-md-6 mb-3">
                  <label class="form-label">Product Name:  <span class="text-danger">*</span></label>
                  <input type="text" name="name" placeholder="Enter Name" class="form-control">  
               </div>
               <div class="col-md-6 mb-3">
                  <label class="form-label">Code: <span class="text-danger">*</span></label>
                  <input type="text" name="code" class=" form-control" placeholder="Enter Code">
                  
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group w-100">
                     <label class="form-label" for="formBasic">Product Category : <span class="text-danger">*</span></label>
                     <select name="category_id" id="category_id" class="form-control form-select">
                        <option value="">Select Category</option>
                        @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                        @endforeach
                     </select>
                    
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group w-100">
                     <label class="form-label" for="formBasic">Brand : <span class="text-danger">*</span></label>
                     <select name="brand_id" id="brand_id" class="form-control form-select">
                        <option value="">Select Brand</option>
                        @foreach ($brands as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                     </select>
                     
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <label class="form-label">Product Price: </label>
                  <input type="text" name="price" class="form-control" placeholder="Enter product price">
                  
               </div>


               <div class="col-md-6 mb-3">
                  <label class="form-label">Stock Alert: <span class="text-danger">*</span></label>
                  <input type="number" name="stock_alert" class="form-control" placeholder="Enter Stock Alert" min="0" required>
                   
               </div>

               <div class="col-md-12">
                  <label class="form-label">Notes: </label>
                  <textarea class="form-control" name="note" rows="3" placeholder="Enter Notes"></textarea>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-4">
         <div class="card">
            <label class="form-label">Multiple Image: <span class="text-danger">*</span></label>
            <div class="mb-3">
               <input name="image[]" accept=".png, .jpg, .jpeg" multiple="" type="file" id="multiImg" class="upload-input-file form-control">
            </div>
               
            <div class="row" id="preview_img"></div>
         </div>
         <div>
            <div class="col-md-12 mb-3">
               <h4 class="text-center">Add Stock : </h4>
            </div>
            <div class="col-md-12 mb-3">
               <div class="form-group w-100">
                  <label class="form-label" for="formBasic">Warehouse : <span class="text-danger">*</span></label>
                  <select name="warehouse_id" id="warehouse_id" class="form-control form-select">
                     <option value="">Select Warehouse</option>
                     @foreach ($warehouses as $item)
                     <option value="{{ $item->id }}">{{ $item->name }}</option>
                     @endforeach
                  </select>
                  
               </div>
            </div>
            <div class="col-md-12 mb-3">
               <div class="form-group w-100">
                  <label class="form-label" for="formBasic">Supplier : <span class="text-danger">*</span></label>
                  <select name="supplier_id" id="supplier_id" class="form-control form-select">
                     <option value="">Select Supplier</option>
                     @foreach ($suppliers as $item)
                     <option value="{{ $item->id }}">{{ $item->name }}</option>
                     @endforeach
                  </select>
                 
               </div>
            </div>

            <div class="col-md-12 mb-3">
               <label class="form-label">Product Quantity: <span class="text-danger">*</span></label>
               <input type="number" name="product_qty" class="form-control" placeholder="Enter Product Quantity" min="1" required>
               
            </div>

            <div class="col-md-12">
               <div class="form-group w-100">
                  <label class="form-label" for="formBasic">Status : <span class="text-danger">*</span></label>
                  <select name="status" id="status" class="form-control form-select">
                     <option selected="">Select Status</option>
                     <option value="Received">Received</option>
                     <option value="Pending">Pending</option> 
                  </select>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-12">
         <div class="d-flex mt-5 justify-content-start">
            <button class="btn btn-primary me-3" type="submit">Save</button>
            <a class="btn btn-secondary" href="{{ route('all.product') }}">Cancel</a>
         </div>
      </div>
   </div>
</form>
</div>
         </div>
      </div>
   </div>
</div>

<!-- JavaScript for Image Preview with Remove Button -->
<script>
    document.getElementById('multiImg').addEventListener('change', function(event) {
        const previewContainer = document.getElementById('preview_img');
        previewContainer.innerHTML = ''; // Clear previous previews

        const files = Array.from(event.target.files); // Convert FileList to Array
        const input = event.target;

        files.forEach((file, index) => {
            // Check if the file is an image
            if (file.type.match('image.*')) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Create preview container
                    const col = document.createElement('div');
                    col.className = 'col-md-3 mb-3';

                    // Create image
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'img-fluid rounded';
                    img.style.maxHeight = '150px';
                    img.alt = 'Image Preview';

                    // Create remove button
                    const removeBtn = document.createElement('button');
                    removeBtn.type = 'button';
                    removeBtn.className = 'btn btn-danger btn-sm position-absolute';
                    removeBtn.style.top = '10px';
                    removeBtn.style.right = '10px';
                    removeBtn.innerHTML = '&times;'; // Cross icon
                    removeBtn.title = 'Remove Image';

                    // Remove button functionality
                    removeBtn.addEventListener('click', function() {
                        col.remove(); // Remove the image preview
                        // Update the file input by creating a new FileList
                        const newFiles = files.filter((_, i) => i !== index);
                        const dataTransfer = new DataTransfer();
                        newFiles.forEach(f => dataTransfer.items.add(f));
                        input.files = dataTransfer.files;
                    });

                    // Create wrapper for positioning
                    const wrapper = document.createElement('div');
                    wrapper.style.position = 'relative';
                    wrapper.appendChild(img);
                    wrapper.appendChild(removeBtn);

                    col.appendChild(wrapper);
                    previewContainer.appendChild(col);
                };

                reader.readAsDataURL(file);
            }
        });
    });
</script>
 

@endsection