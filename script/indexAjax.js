$(document).ready(function(){
    $("#productList").submit(function(event){
        event.preventDefault()
        const checkbox = [];
        const deleteBtn = $("#delete-product-btn").val();

        $('.delete-checkbox').each(function(){  
            if(this.checked) {              
                 checkbox.push($(this).val());                                                                               
            }  
       }); 

        function deleteProducts(){
            $.post("controllers/accessDatabase.php", {
                selectedProducts: checkbox,
                deleteBtn: deleteBtn
            },function(){
                window.location.reload()
            })
        }
        deleteProducts()
    })

    
})