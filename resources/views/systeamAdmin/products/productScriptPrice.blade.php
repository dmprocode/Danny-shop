<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        


        $(document).on('click','.edit-product-price',function(e){
            e.preventDefault()
            let product_id = $(this).data('id');
            let selling_price_per_dozen = $(this).data('selling_price_per_dozen')
            let selling_price_per_piece = $(this).data('selling_price_per_piece')
            let up_productname = $(this).data('name')
            let buying_price =$(this).data('buying_price')
            
            
            $('#up_productname').val(up_productname)
            $('#up_buying_price').val(buying_price)
            $('#up_id').val(product_id)
        })
    })

</script>