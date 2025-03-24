<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#add-products-div').hide()

        $(document).on('click', '.add-products-btn', function (e) {
            e.preventDefault()
            $('#products-table').hide()
            $('#add-products-div').show()

        })

        $(document).on('click', '.go-back-btn', function (e) {
            e.preventDefault()
            $('#products-table').show()
            $('#add-products-div').hide()

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
                    console.log(res);
                    
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: res.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    

                },
                error: function (error) {
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



        // ==================Update Products=====================
        $(document).on('click', '.edit-products', function (e) {
    let id = $(this).data('id');
    let name = $(this).data('name');
    let price = $(this).data('price');
    let number_catton = $(this).data('number_catton');
    let number_of_pieces = $(this).data('number_of_pieces');
    let number_of_set = $(this).data('number_of_set');
    let category = $(this).data('category');
    let size = $(this).data('size');
    let color = $(this).data('color');
    let pricePerIteams = $(this).data('selling_price_per_item')
      console.log(pricePerIteams);
      
    // Fill form fields
    $('#id').val(id);
    $('#up-productname').val(name);
    $('#up-buying_price').val(price);
    $('#up-number_of_catton').val(number_catton);
    $('#up-number_of_set').val(number_of_set);
    $('#up-picess').val(number_of_pieces);
    $('#up-category').val(category);
    $('#up-color').val(color);
    $('#up-size').val(size);
    $('#up-price-perIteams').val(pricePerIteams)
    $('#up-selling-price').val(sellingPrice)
});

// Update Product
$(document).on('click', '#updateProduct-btn', function (e) {
    e.preventDefault();

    let id = $('#id').val();
    let productname = $('#up-productname').val();
    let buying_price = $('#up-buying_price').val();
    let number_of_catton = $('#up-number_of_catton').val();
    let number_of_set = $('#up-number_of_set').val();
    let picess = $('#up-picess').val();
    let category = $('#up-category').val();
    let color = $('#up-color').val();
    let size = $('#up-size').val();
    let priceperIteams =  $('#up-price-perIteams').val()

    $.ajax({
        url: "{{ route('update-product') }}",
        method: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'), // Add CSRF Token
            id: id,
            productname: productname,
            buying_price: buying_price,
            number_of_catton: number_of_catton,
            number_of_set: number_of_set,
            picess: picess,
            category: category,
            color: color,
            size: size,
            priceperIteams:priceperIteams       
        },
        success: function (res) {
            console.log(res);
            
            Swal.fire({
                icon: "success",
                title: "Product Updated Successfully",
                showConfirmButton: false,
                timer: 1500
            });
        },
        error: function (error) {
            console.log(error);
            Swal.fire({
                icon: "error",
                title: "Update Failed",
                text: "Please check your inputs"
            });
        }
    });
});


    })













</script>