<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#make-parchasses-div').hide()
        $('#update-parchasses-div').hide()

        $(document).on('click', '.make-purchases-btn', function (e) {
            e.preventDefault()
            $('#parchasses-table').hide()
            $('#make-parchasses-div').show()

        })

        $(document).on('click', '.go-back-btn', function (e) {
            e.preventDefault()
            $('#parchasses-table').show()
            $('#make-parchasses-div').hide()
            $('#update-parchasses-div').hide()

        })

        $(document).on('change', '#select-product-price', function (e) {
            e.preventDefault()
            let productPrice = $('.product-price').val()
            $.ajax({
                url: "{{route('products-parchasses-price')}}",
                method: "POST",
                data: {
                    productPrice: productPrice,
                },
                success: function (res) {
                    console.log(res);
                    $('#parchasses-buying-price').val(res.producttsPrice.buying_price);
                    $('#parchasses_number_of_catton').val(res.producttsPrice.number_carton);
                    $('#parchasses-picess').val(res.producttsPrice.number_pieces)

                },
                error: function (error) {
                    console.log(error);

                }
            })

        })


        $(document).on('click', '#parchasses-products-btn', function (e) {
            e.preventDefault()
            $('.message').html('')
            let parchassesFormData = new FormData(document.getElementById('parchassesFrormData'));
            $.ajax({
                url: "{{route('add-parchasses')}}",
                method: "POST",
                contentType: false,
                processData: false,
                data: parchassesFormData,

                success: function (res) {

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
                error: function (error) {
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

        //    ==============Update products===========

        $(document).on('click', '#edit-parchasses-btn', function (e) {
            e.preventDefault()
            $('#update-parchasses-div').show()
            $('#parchasses-table').hide()

            let id = $(this).data('id')
            let buying_price = $(this).data('buying_price')
            let number_catton = $(this).data('number_catton')
            let sales_point = $(this).data('sales_point')
            let product_name = $(this).data('name')
            let number_picess = $(this).data('number_picess')
            $('#up_id').val(id)
            $('#products-name').val(product_name)
            $('#up_buying_price').val(buying_price)
            $('#up_catton').val(number_catton)
            $('#parchasses_picess').val(number_picess)
            $('#salePoint').val(sales_point)

        })

        $(document).on('click', '#update-parchasses-btn', function (e) {
            e.preventDefault()
            let id = $('#up_id').val()
            let productsname = $('#products-name').val()
            let buying_price = $('#up_buying_price').val()
            let up_catton = $('#up_catton').val()
            let parchasses_picess = $('#parchasses_picess').val()
            let salePoint = $('#salePoint').val()

            $.ajax({
                url: "{{route('update-parchasses')}}",
                method: "post",
                data: {
                    id: id,
                    productsname: productsname,
                    buying_price: buying_price,
                    up_catton: up_catton,
                    parchasses_picess: parchasses_picess,
                    salePoint: salePoint
                },
                success: function (res) {
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
                error: function (error) {
                    console.log(error);

                }
            })

        })

        $(document).on('click', '.delete-btn', function (e) {
            e.preventDefault();
            let delete_id = $(this).data('id');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('delete-parchasses') }}",
                        method: "POST",
                        data: {
                            delete_id: delete_id,
                            _token: "{{ csrf_token() }}" // Ensure CSRF token is included
                        },
                        success: function (res) {
                            Swal.fire({
                                title: "Deleted!",
                                text: res.message,
                                icon: "success"
                            });

                            setTimeout(() => {
                                location.reload();
                            }, 1500);
                        },
                        error: function (error) {
                            console.log(error);
                            Swal.fire({
                                title: "Error!",
                                text: "Something went wrong. Try again.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        });


        $(document).on('click', '#view-more-btn', function (e) {
            e.preventDefault();

            let product_id = $(this).data('id'); 
            let url = "/admin/viewMoreParchasses/" + product_id;
            window.location.href = url;
        });

        $(document).on('click','#view-more-product',function(e){
            e.preventDefault()
            let product_id = $(this).data('id')
            let url = "/admin/viewMoreParchasses/" + product_id;
            window.location.href = url;

        })


    })





</script>