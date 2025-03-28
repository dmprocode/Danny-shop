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
            let price_per_item = $(this).data('price_per_item')
            // console.log(id,name,buying_price,number_carton,number_pieces,size,color,price_per_dozen,price_per_item);
            $('#id').val(id);
            $('#up_productname').val(name)
            $('#up_buying_price').val(buying_price)
            $('#up_number_of_catton').val(number_carton)
            $('#up_picess').val(number_pieces)
            $('#up_category').val(category)
            $('#up_price_perIteams').val(price_per_item)
            $('#up_color').val(color)
            $('#up_size').val(size)


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
            // console.log(id,name,buying_price,number_of_catton,category,picess,color,size);
            let formData = document.getElementById('up-productsFormData')
             let newUpdateData = new FormData(formData)
             
            $.ajax({
            url: "{{route('update-product')}}",
            method: "POST",
            contentType:false,
            processData:false,
            data:newUpdateData,
            
            success: function(res) {
                console.log(res);
                Swal.fire({
                    icon: "success",
                    title: "Product Updated Successfully",
                    showConfirmButton: false,
                    timer: 1500
                });
                setTimeout(() => {
                    location.reload();
                }, 1500);
            },
    error: function(error) {
        console.log(error);
        Swal.fire({
            icon: "error",
            title: "Update Failed",
            text: "Please check your inputs"
        });
    }
});


            

        })













</script>