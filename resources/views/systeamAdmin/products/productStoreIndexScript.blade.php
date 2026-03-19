<script>
    $(document).ready(function(){

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        $('#product-store-form').hide()
        $('#update-product-div').hide()
    
   $(document).on('click', '.add-product-store', function(e) {
        e.preventDefault();
         $('#product-store-form').show()
         $('#products-table').hide()
         
});

$(document).on('click', '#addProductsstore', function(e){
    e.preventDefault();
    $('.message').html('')
    let product_id = $('#product_id').val();
    let numberOfCtn = $('#numberOfCtn').val();

    $.ajax({
        url:"{{route('add-product-store')}}",
        method:"POST",
        data:{
            product_id:product_id,
            numberOfCtn:numberOfCtn
        },
         success: function(res) {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: res.message || 'Success!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    location.reload();
                });
        },
        error:function(error){            
        $('.product_name').html(error.responseJSON.errors.product_id)
        $('.number-ctn').html(error.responseJSON.errors.numberOfCtn)

        }
    })
    
   
});


    $(document).on('click','.product-edit-store-btn',function(e){
        e.preventDefault()
        $('#update-product-div').show()
        $('#products-table').hide()

         let name= $(this).data('name');
         let number_of_cartons = $(this).data('number_of_cartons');
         let product_id= $(this).data('product_id');
         let id = $(this).data('id')
         

         $('.product-name').val(name)
         $('.number-cattons').val(number_of_cartons)
         $('#product-id').val(id)
         

         $(document).on('click', '#edit-product-store',function(e){
            e.preventDefault()
            let name = $('.product-name').val()
            let number_of_cartons = $('.number-cattons').val()
            let  id = $('.id').val()
            
            $.ajax({
                url:"{{route('update-product-store')}}",
                method:"POST",
                data:{
                    name:name,
                    number_of_cartons:number_of_cartons,
                    id:id,
                },
                success:function(res){
                    Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: res.message,
                    showConfirmButton: false,
                    timer: 1500
                    }).then(()=>{
                        location.reload()
                    })
                    
                },
                error:function(error){
                    console.log(error);
                    
                }
            })


       })

         
    })
    $(document).on('click', '.delete-product-store', function(e) {
    e.preventDefault();
    
    let delete_store_product_id = $(this).data('id');
    let button = $(this);
    
    // Show confirmation first
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
            // User confirmed - proceed with AJAX
            $.ajax({
                url: "{{ route('delete-product-store') }}",
                method: "POST",
                data: {
                    delete_store_product_id: delete_store_product_id,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    Swal.fire({
                        title: "Deleted!",
                        text: res.message || "Product has been deleted.",
                        icon: "success",
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        // Optional: Remove row from table or reload
                        button.closest('tr').fadeOut();
                        // location.reload();
                    });
                    console.log(res);
                },
                error: function(error) {
                    Swal.fire({
                        title: "Error!",
                        text: "Something went wrong.",
                        icon: "error"
                    });
                    console.log(error);
                }
            });
        }
    });
});
})
</script>