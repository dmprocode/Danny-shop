
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#capital-form').hide()
       
       
        $(document).on('click','.add-capital',function(e){
            e.preventDefault()
            $('#capital-form').show()
            $('#capital-table').hide()
        })
        $(document).on('click','.go-back-btn',function(e){
            e.preventDefault()
            $('#capital-form').hide()
            $('#capital-table').show()
        })
        $(document).on('click','.add-capital-btn', function (e){
            e.preventDefault()
            $('.message').html('')
            $('#capital-form').show()
            $('#capital-table').hide()
            let userInput = document.getElementById('userFormData');
            let userFormDateails = new FormData(userInput);
            $.ajax({
              url:"{{route('add-capital')}}",
              method:"POST",
              contentType:false,
              processData:false,
              data:userFormDateails,
              success:function(res){
                console.log(res);
                
                Swal.fire({
                position: "top-end",
                icon: "success",
                title:res.message,
                showConfirmButton: false,
                timer: 1500
                });
                
              },
              error:function (error){
                if (error) {
                    $('.userRole').html(error.responseJSON.errors.userRole)
                    $('.start_amount').html(error.responseJSON.errors.start_amount)

                }
                
              }



        })
            
         })

         

        
    

    })



   
   
</script>