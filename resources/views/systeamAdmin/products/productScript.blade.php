<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#add-products-div').hide()

        $(document).on('click','.add-products-btn',function(e){
            e.preventDefault()
            $('#products-table').hide()
            $('#add-products-div').show()
            
        })

        $(document).on('click','.go-back-btn',function(e){
            e.preventDefault()
            $('#products-table').show()
            $('#add-products-div').hide()
            
        })

        $(document).on('click','#addProducts', function(e){
            e.preventDefault()
            $('.message').html('')
             let productData = document.getElementById('productsFormData')             
             let productInputDetails = new FormData(productData)
             
             $.ajax({
                url:"{{route('product-index')}}",
                method:"POST",
                data:productInputDetails,
                contentType:false,
                processData:false,
                success:function(res){
                    Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title:res.message,
                    showConfirmButton: false,
                    timer: 1500
                });
                setTimeout(() => {
                    location.reload()
                }, 1500);
                    
                },
                error:function(error){
                    console.log(error);
                    
                   if (error) {
                    $('.product_name').html(error.responseJSON.errors.product_name)
                    $('.product_image').html(error.responseJSON.errors.product_image)
                    $('.product_price').html(error.responseJSON.errors.product_price)
                    $('.product_price').html(error.responseJSON.errors.product_price)
                    $('.number_of_catton').html(error.responseJSON.errors.number_of_catton)
                    $('.number_of_pieces').html(error.responseJSON.errors.number_of_pieces)
                    $('.category').html(error.responseJSON.errors.category)
                    $('.product_iteams').html(error.responseJSON.errors.product_iteams)
                    $('.buying_price').html(error.responseJSON.errors.buying_price)


                   }
                    
                }
             })
             
        })
        
        


        
        

        


    })

        


     








</script>