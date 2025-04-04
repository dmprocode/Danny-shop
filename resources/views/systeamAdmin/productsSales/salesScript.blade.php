<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
    })

    $('#sales-products-div').hide()
    $(document).on('click','.sale-products-btn',function(e){
        e.preventDefault()
        $('#sales-products-div').show()
        $('#sales-product-table').hide()
    })
    $(document).on('click','.go-back-btn',function(e){
        e.preventDefault()
        $('#sales-products-div').hide()
        $('#sales-product-table').show()
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
    let product_id = $('.product_id').val()
    let customer_id = $('.customer_id').val()
    let quantityStock = $('.quantityStock').val()
    let customer_quantity = $('#customer_quantity').val()
    let sellingPrice = $('#sellingPrice').val()
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
            console.log(res);
            
        },
        error:function(error){
            console.log(error);
            
        }
    })
    
    
   
})

</script>