document.addEventListener("DOMContentLoaded", function(){

    let productSearchInput = document.getElementById("product_search");
    let warehouseDropdown = document.getElementById("warehouse_id");
    let productList = document.getElementById("product_list");
    let warehouseError = document.getElementById("warehouse_error");
    let orderItemsTableBody = document.querySelector("tbody");

    productSearchInput.addEventListener("keyup", function(){
        let query = this.value;
        let warehouse_id = warehouseDropdown.value;

        if (!warehouse_id ) {
            warehouseError.classList.remove('d-none'); 
            productList.innerHTML = "";
            return;
        } else{
            warehouseError.classList.add('d-none'); 
        }
        if (query.length > 1) {
            fetchProducts(query,warehouse_id);
        }else{
            productList.innerHTML = "";
        }
    });


    function fetchProducts(query,warehouse_id) {
        fetch(productSearchUrl + "?query=" + query + "&warehouse_id=" + warehouse_id)
            .then(response => response.json())
            .then(data => {
                productList.innerHTML = "";
                if (data.length > 0) {
                    data.forEach(product => {
                        let item = `<a href="#" class="list-group-item list-group-item-action product-item"
                            data-id="${product.id}"
                            data-code="${product.code}"
                            data-name="${product.name}"
                            data-cost="${product.price}"
                            data-stock="${product.product_qty}">
                            <span class="mdi mdi-text-search"></span>
                            ${product.code} - ${product.name}
                            </a> `;
                            productList.innerHTML += item; 
                           // console.log(item);
                    });

        // add event listener for product selection 
        document.querySelectorAll(".product-item").forEach(item => {
            item.addEventListener("click", function(e) {
                e.preventDefault();
                addProductToTable(this);
            });
        });
 
        } else {
            productList.innerHTML = '<p class="text-muted">No Product Found</p>'
        }
    });
        
    }

    ///// Add Product in to the table 
    function addProductToTable(productElement) {
        let productId = productElement.getAttribute("data-id");
        let productCode = productElement.getAttribute("data-code");
        let productName = productElement.getAttribute("data-name");
        let netUnitCost = parseFloat(productElement.getAttribute("data-cost"));
        let stock = parseInt(productElement.getAttribute("data-stock"));

        // Check if product already exists in table
        if (document.querySelector(`tr[data-id="${productId}"]`)) {
              alert("Product already added.");
              return;
        }

      let row = `
      <tr data-id="${productId}">
          <td>
              ${productCode} - ${productName} 
              <button type="button" class="btn btn-primary btn-sm edit-discount-btn"
                  data-id="${productId}" 
                  data-name="${productName}" 
                  data-cost="${netUnitCost}"
                  data-bs-toggle="modal">
                  <span class="mdi mdi-book-edit "></span>
              </button>
              <input type="hidden" name="products[${productId}][id]" value="${productId}">
              <input type="hidden" name="products[${productId}][name]" value="${productName}">
              <input type="hidden" name="products[${productId}][code]" value="${productCode}">
          </td>
          <td>${netUnitCost.toFixed(2)}
              <input type="hidden" name="products[${productId}][cost]" value="${netUnitCost}">
          </td>
          <td style="color:#ffc121">${stock}</td>
          <td>
              <div class="input-group">
                  <button class="btn btn-outline-secondary decrement-qty" type="button">−</button>
                  <input type="text" class="form-control text-center qty-input"
                      name="products[${productId}][quantity]" value="1" min="1" max="${stock}"
                      data-cost="${netUnitCost}" style="width: 30px;">
                  <button class="btn btn-outline-secondary increment-qty" type="button">+</button>
              </div>
          </td>
          <td>
              <input type="number" class="form-control discount-input"
                  name="products[${productId}][discount]" value="0" min="0" style="width:100px">
          </td>
          <td class="subtotal">${netUnitCost.toFixed(2)}</td>
          <td><button class="btn btn-danger btn-sm remove-product"><span class="mdi mdi-delete-circle mdi-18px"></span></button></td>
      </tr>
  `;

        orderItemsTableBody.innerHTML += row;
        productList.innerHTML = "";
        productSearchInput.value = ""; 
        
  }
    



});