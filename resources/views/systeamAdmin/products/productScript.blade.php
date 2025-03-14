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
             let productData = document.getElementById('productsFormData')
             let productInputDetails = new FormData(productData)
             console.log(productInputDetails);
             
        })
        
        


        
        

        


    })

        


     








</script>