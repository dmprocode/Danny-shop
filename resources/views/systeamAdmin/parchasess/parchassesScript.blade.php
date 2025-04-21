
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#make-parchasses-div').hide()
        
        $(document).on('click','.make-purchases-btn',function(e){
            e.preventDefault()
            $('#parchasses-table').hide()
            $('#make-parchasses-div').show()

        })

        $(document).on('click','.go-back-btn',function(e){
            e.preventDefault()
            $('#parchasses-table').show()
            $('#make-parchasses-div').hide()
        })

        $(document).on('change','#select-product-price',function(e){
            e.preventDefault()
            let productPrice =  $('.product-price').val()
            $.ajax({
                url:"{{route('products-parchasses-price')}}",
                method:"POST",
                data:{
                    productPrice:productPrice,
                },
                success:function(res){
                    console.log(res);
                    $('#parchasses-buying-price').val(res.producttsPrice.buying_price);
                    $('#parchasses_number_of_catton').val(res.producttsPrice.number_carton);
                    $('#parchasses-picess').val(res.producttsPrice.number_pieces)
                    
                },
                error:function(error){
                   console.log(error);
                   
                }
            })
             
        })


        $(document).on('click','#parchasses-products-btn', function(e){
            e.preventDefault()
              $('.message').html('')
            let parchassesFormData = new FormData(document.getElementById('parchassesFrormData'));
            $.ajax({
                url:"{{route('add-parchasses')}}",
                method:"POST",
                contentType:false,
                processData:false,
                data:parchassesFormData,
        
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
                    
                    $('.product-name-MSG ').html(error.responseJSON.errors.product_name)
                    $('.parchasses-buying-priceMSG').html(error.responseJSON.errors.buying_price)
                    $('.number_of_catton').html(error.responseJSON.errors.number_of_catton)
                    $('.product-priceMSG').html(error.responseJSON.errors.buying_price)
                    $('.number_of_pieces').html(error.responseJSON.errors.number_of_pieces)
                    $('.sale-point').html(error.responseJSON.errors.salesPoint)

                    
                }
            })
            
        })


       


       


 


    })



   
   
</script>