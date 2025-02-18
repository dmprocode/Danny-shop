
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

       $('#user-form').hide()

       $(document).on('click','.add-user', function(e){
        e.preventDefault()
        $('#user-form').show()
        $('#user-table').hide()
       })


       $(document).on('click','.go-back-btn ', function(e){
        e.preventDefault()
        $('#user-form').hide()
        $('#user-table').show()
       })


       $(document).on('click','.root-btn', function(e){
        $(this).html(' <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"> </span>')

       })

    //    =====================Add User Button==========================

    $(document).on('click','.add-user-btn',function(e){
        e.preventDefault()
        let userForm = document.getElementById('userFormData');
        let userData = new FormData(userForm);
        $('.message').html('')

        $.ajax({
            url:"{{route('add-product')}}",
            method:"POST",
            contentType:false,
            processData:false,
            data:userData,
            success:function(res){
                console.log(res);
                
            },
            error:function(error){
                console.log(error);
                
             $('.fullname').html(error.responseJSON.errors.fullname)   
             $('.email').html(error.responseJSON.errors.email)  
             $('.password').html(error.responseJSON.errors.password)   
             $('.dob').html(error.responseJSON.errors.dob)              
             $('.userRole').html(error.responseJSON.errors.userRole)  
             $('.gender').html(error.responseJSON.errors.gender)  
             $('.userImage').html(error.responseJSON.errors.userImage)   
         
            
           
             
            }
        })

        
        
        
     })
    })
   
</script>