document.addEventListener("DOMContentLoaded", function(){

    let productSearchInput = document.getElementById("product_search");
    let warehouseDropdown = document.getElementById("warehouse_id");
    let product_list = document.getElementById("product_list");
    let warehouseError = document.getElementById("warehouse_error");
    let orderItemsTableBody = document.querySelector("tbody");

    productSearchInput.addEventListener("keyup", function(){
        let query = this.value;
        let warehouse_id = warehouseDropdown.value;

        if (!warehouse_id ) {
            warehouseError.classList.remove('d-none'); 
            product_list.innerHTML = "";
            return;
        } else{
            warehouseError.classList.add('d-none'); 
        }
        if (query.length > 1) {
            fetchProducts(query,warehouse_id);
        }else{
            product_list.innerHTML = "";
        }
    });


    function fetchProducts(query,warehouse_id) {
        
    }



});