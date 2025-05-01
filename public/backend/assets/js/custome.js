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
                            <i class="fas fa-search me-2"></i>
                            ${product.code} - ${product.name}
                            </a> `;
                            productList.innerHTML += item;
                    });

        // add event listener for product selection 
        document.querySelectorAll(".product-item").forEach(item => {
            item.addEventListener("click", function(e) {
                e.preventDefault();
            });
        });
 
        } else {
            productList.innerHTML = '<p class="text-muted">No Product Found</p>'
        }
    });
        
    }
    



});