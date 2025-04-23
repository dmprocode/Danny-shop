<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
    })

    $('#sales-products-div').hide() 
    $('#Update-products-sales').hide()
    $(document).on('click','.sale-products-btn',function(e){
        e.preventDefault()
        $('#Update-products-sales').hide()
        $('#sales-products-div').show()
        $('#sales-product-table').hide()
    })
    $(document).on('click','.go-back-btn',function(e){
        e.preventDefault()
        $('#sales-products-div').hide()
        $('#sales-product-table').show()
        $('#Update-products-sales').hide()
    })


$(document).on('click','#add_customer', function(e){
    e.preventDefault()
    $('.message').html('')
    let customerName = $('#customer_name').val()
    let phonenumber = $('#phone_number').val()

    $.ajax({
        url:"{{route('add-product')}}",
        method:"POST",
        data:{
            customerName:customerName,
            phonenumber:phonenumber
            
        },
        success:function(res){
            Swal.fire({
            position: "top-end",
            icon: "success",
            title: res.message,
            showConfirmButton: false,
            timer: 1500
            });
            setTimeout(() => {
                location.reload()
            }, 1500);
            
            
        },
        error:function(error){
            console.log(error);
            $('.customer-name').html(error.responseJSON.errors.customerName)
            $('.phone-number').html(error.responseJSON.errors.phonenumber)
            
        }
    

    })

    
  
     
})
// ===================on Change Product name============

$(document).ready(function() {
    $(document).on('change', '#product-name', function() {
        let productId = $(this).val();  // Get selected product ID
        // let productNama = $(this).find("option:selected").text(); // Get selected product name

        $.ajax({
            url:"{{route('find-product-price')}}",
            method:"POST",
            data: {
                productId:productId
            },
            success: function(res) {
                if (res && res.message) {
                    $('.quantityStock').val(res.message.number_pieces); 
                } 
                if (res && res.message) {
                    console.log(res);
                    
                    $('#buyingPrice').val(res.message.price_per_item); 
                } 
            },
            error:function(res){
                console.log(error);
                
            }
        })
        
    });
});


// ====================Sale Products ===========================
$(document).on('click','#sell-product-button', function(e){
    e.preventDefault()
    $('.message').html('')
    let product_id = $('#product-name').val()
    let customer_id = $('.customer_id').val()
    let quantityStock = $('.quantityStock').val()
    let customer_quantity = $('#customer_quantity').val()
    let sellingPrice = $('#sellingPrice').val()
    console.log(product_id);
    
    $.ajax({
        url:"{{route('add-product-sold')}}",
        method:"POST",
        data:{
            product_id:product_id,
            customer_id:customer_id,
            customer_quantity:customer_quantity,
            sellingPrice:sellingPrice,
        },
        success:function(res){
            if (res.status === 400) {
                Swal.fire({
                icon: "error",
                title: "Oops...",
                text: res.message,
                });
                setTimeout(() => {
                    location.reload()
                }, 2000);
            }else{
                Swal.fire({
            position: "top-end",
            icon: "success",
            title: res.message,
            showConfirmButton: false,
            timer: 1500
            });
            setTimeout(() => {
                location.reload();
            }, 1500);
            }
        
           

            
        },
        error:function(error){
            console.log(error);
            
          $('.customer_name').html(error.responseJSON.errors.customer_id)
          $('.product_name').html(error.responseJSON.errors.product_id)
          $('.customer_quantity').html(error.responseJSON.errors.customer_quantity)
          $('.sellingprice').html(error.responseJSON.errors.sellingPrice)

        }
    })
    
    
   
})

$(document).on('click','#edit-product-sell', function(e){
    e.preventDefault()
    $('#sales-product-table').hide()
    $('#Update-products-sales').show()
    let user_id = $(this).data('id');
    let fullname = $(this).data('fullname')
    let productname = $(this).data('name')
    let price_per_item = $(this).data('price_per_item')
    let selling_price = $(this).data('selling_price')
    let product_id = $(this).data('product_id')
    let product_quantity = $(this).data('product_quantity')
    
     $('#up_id').val(user_id)
     $('#product_id').val(product_id)
     $('#customert_name').val(fullname)
     $('#product_name').val(productname)
     $('#up_buyingPrice').val(price_per_item)
     $('#up_productQuantity').val(product_quantity)
     $('#up_sellingPrice').val(selling_price)
})

$(document).on('click','#update-product-sell', function(e){
    e.preventDefault()
    let user_id=$('#up_id').val()
    let products_id = $('#product_id').val()
    let customername = $('#customert_name').val()
    let product_name = $('#product_name').val()
    let up_buyingPrice = $('#up_buyingPrice').val()
    let up_productQuantity = $('#up_productQuantity').val()
    let up_sellingPrice = $('#up_sellingPrice').val()

    $.ajax({
        url:"{{route('update-products-sales')}}",
        method:"post",
        data:{
            user_id:user_id,
            products_id:products_id,
            customername:customername,
            product_name:product_name,
            up_buyingPrice:up_buyingPrice,
            up_productQuantity:up_productQuantity,
            up_sellingPrice:up_sellingPrice
            
            
            
        },
        success:function(res){
            Swal.fire({
            position: "top-end",
            icon: "success",
            title: res.message,
            showConfirmButton: false,
            timer: 1500
            });
            setTimeout(() => {
                location.reload()
            }, 1500);
            
        },
        error:function(error){
            console.log(error);
            
        }
    })
    

})


$(document).on('click','#delete_products_sell',function(e){
    e.preventDefault()
    let product_id = $(this).data('id');
    let user_id = $(this).data('user')
    
    $.ajax({
        url:"{{route('delete-products')}}",
        method:"POST",
        data:{
            product_id:product_id,
            user_id:user_id
        },
        success:function(res){
            Swal.fire({
            position: "top-end",
            icon: "success",
            title: res.message,
            showConfirmButton: false,
            timer: 1500
            });    
            setTimeout(() => {
                location.reload()
            }, 1500);     
            
        },
        error:function(error){
            console.log(error);
            
        }
    })
    
})




</script>