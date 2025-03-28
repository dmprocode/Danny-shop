<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#add-products-div').hide()
        $('#up-products-div').hide();


        $(document).on('click', '.add-products-btn', function (e) {
            e.preventDefault()
            $('#products-table').hide()
            $('#add-products-div').show()

        })

        $(document).on('click', '.go-back-btn', function (e) {
            e.preventDefault()
            $('#products-table').show()
            $('#add-products-div').hide()
            $('#up-products-div').hide()


        })



        $(document).on('click', '#addProducts', function (e) {
            e.preventDefault()
            $('.message').html('')
            let productData = document.getElementById('productsFormData')
            let productInputDetails = new FormData(productData)

            $.ajax({
                url: "{{route('product-index')}}",
                method: "POST",
                data: productInputDetails,
                contentType: false,
                processData: false,
                success: function (res) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: res.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    location.reload()


                },
                error: function (error) {
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




        // Update Product
        $(document).on('click', '.edit-product-btn', function (e) {
            e.preventDefault();
            $('#up-products-div').show()
            $('#products-table').hide()
            let id = $(this).data('id');
            let name = $(this).data('name');
            let category = $(this).data('category');
            let buying_price = $(this).data('buying_price');
            let number_carton = $(this).data('number_carton');
            let number_pieces = $(this).data('number_pieces');
            let color = $(this).data('color');
            let size = $(this).data('size');
            let price_per_dozen = $(this).data('price_per_dozen');
            let price_per_item = $(this).data('price_per_item')
            // console.log(id,name,buying_price,number_carton,number_pieces,size,color,price_per_dozen,price_per_item);
            $('#id').val(id);
            $('#up-productname').val(name)
            $('#up-buying_price').val(buying_price)
            $('#up-number_of_catton').val(number_carton)
            $('#up-picess').val(number_pieces)
            $('#up-category').val(category)
            $('#up-price-perIteams').val(price_per_item)
            $('#up-color').val(color)
            $('#up-size').val(size)


        });

    })

    $(document).on('click', '#updateProduct-btn', function (e) {
            e.preventDefault()
            let id = $('#id').val()
            let name = $('#up-productname').val()
            let buying_price = $('#up-buying_price').val()
            let number_of_catton = $('#up-number_of_catton').val()
            let category = $('#up-category').val()
            let picess = $('#up-picess').val()
            let color = $('#up-color').val();
            let size = $('#up-size');
            $.ajax({
                url:"{{route('update-product')}}",
                method:"POST",
                data:{
                    id:id,
                    name:name,
                    buying_price:buying_price,
                    number_of_catton:number_of_catton,
                    category:category,
                    picess:picess,
                    color:color,
                    size:size
                    

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