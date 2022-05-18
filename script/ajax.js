$(document).ready(function(){
    $("#product_form").submit(function(event){
        event.preventDefault()
        const sku = $("#sku").val()
        const name = $("#name").val()
        const price = $("#price").val()
        const save = $("#save").val()

        const size = $("#size").val()
        const height = $("#height").val()
        const width = $("#width").val()
        const length = $("#length").val()
        const weight = $("#weight").val()

        let skuError = true
        let nameError = true
        let priceError = true
        let optionError = true

        const redirectLocation = "/";

        function error(){
            if(skuError == false && nameError == false && priceError == false && optionError == false){
                if(size !== undefined){
                    $.post("controllers/accessDatabase.php", {
                        sku: sku,
                        name: name,
                        price: price + "$",
                        option: "Size: " + size + " MB"
                    },function(){
                        location.href = redirectLocation
                    })
                }

                if(height !== undefined && width !== undefined && length !== undefined){
                    $.post("controllers/accessDatabase.php", {
                        sku: sku,
                        name: name,
                        price: price + "$",
                        option: `Dimension: ${height}x${width}x${length}`
                    },function(){
                        location.href = redirectLocation
                    })
                }

                if(weight !== undefined){
                    $.post("controllers/accessDatabase.php", {
                        sku: sku,
                        name: name,
                        price: price + "$",
                        option: "Weight: " + weight + " KG"
                    },function(){
                        location.href = redirectLocation
                    })
                }
            }
        }
        
        $(".skuError").load("classes/validation.php", {
            sku: sku,
            save: save
        }, function(data){
            if(data == "Please submit required data" || data == "Please provide the data of indicated type" || data == "Sku already Exist"){
                skuError = true
            }else {
                skuError = false
            }
            error()
        })

        $(".nameError").load("classes/validation.php", {
            name: name,
            save: save
        }, function(data){
            if(data == "Please submit required data" || data == "Please provide the data of indicated type"){
                nameError = true
            }else {
                nameError = false
            }
            error()
        })

        $(".priceError").load("classes/validation.php", {
            price: price,
            save: save,
        }, function(data){
            if(data == "Please submit required data" || data == "Please provide the data of indicated type"){
                priceError = true
            }else {
                priceError = false
            }
            error()
        })

        $(".optionError").load("classes/validation.php", {
            size: size,
            height: height,
            width: width,
            length: length,
            weight: weight,
            noInput: "",
            save: save
        }, function(data){
            if(data == "Please submit required data" || data == "Please provide the data of indicated type"){
                optionError = true
            }else {
                optionError = false
            }
            error()
        })
    })

    $("#productType").change(function(){
        const typeSwitcher = $(this).val()

        $(".switchInputs").load("classes/optionForms.php", {
            typeSwitcher: typeSwitcher
        })
    })
})