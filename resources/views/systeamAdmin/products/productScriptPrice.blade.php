<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#up-product-price-div').hide()

        $(document).on('click','.edit-product-price',function(e){
            e.preventDefault()
            $('#up-product-price-div').show()
            $('#products-table').hide()
            let product_id = $(this).data('id');
            let selling_price_per_dozen = $(this).data('selling_price_per_dozen')
            let selling_price_per_piece = $(this).data('selling_price_per_piece')
            let productname = $(this).data('name')
            let buying_price =$(this).data('buying_price')
            
            
            $('#productname').val(productname)
            $('#up_buying_price').val(buying_price)
            $('#up_id').val(product_id)
            

           
        })

        $(document).on('click','.go-back-btn',function(e){
            e.preventDefault()
            $('#up-product-price-div').hide()
            $('#products-table').show()

        })

        $(document).on('click' ,'#up-product-price', function(e){
          e.preventDefault()
          $('.message').html('')
        let id = $('#up_id').val()
        let buyingPrice = $('#up_buying_price').val()
        let sellingprice = $('#selling_price_piece').val();
        let productname = $('#productname').val()
        let priceper_dazeen = $('#up_price_perDazeen').val()
        $.ajax({
            url:"{{route('set-product-price')}}",
            method:"POST",
            data:{
                id:id,
                buyingPrice:buyingPrice,
                sellingprice:sellingprice,
                productname:productname,
                priceper_dazeen:priceper_dazeen

            },
            success:function(res){
                Swal.fire({
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
                $('.sellingprice ').html(error.responseJSON.errors.sellingprice)
                $('.selling-price-dzn').html(error.responseJSON.errors.priceper_dazeen)
                
            }
        })
 
        })
    })

</script>