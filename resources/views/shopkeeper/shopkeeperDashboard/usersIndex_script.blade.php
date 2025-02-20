
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       $('#user-form').hide()
       $('#update-user-form').hide()


       $(document).on('click','.add-user', function(e){
        e.preventDefault()
        $('#user-form').show()
        $('#user-table').hide()
       })



       $(document).on('click','.go-back-btn ', function(e){
        e.preventDefault()
        $('#user-form').hide()
        $('#user-table').show()
        $('#update-user-form').hide()

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
            url:"{{route('add-user')}}",
            method:"POST",
            contentType:false,
            processData:false,
            data:userData,
            success:function(res){
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
            error:function(error){  
                
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
         // ===================Edit User ========================

     $(document).on('click','.edit-user', function(e){
        e.preventDefault()
        $('#user-table').hide()
        $('#update-user-form').show()
        $('.page-title').html('Update User')
        let user_id = $(this).data('id')
        let email = $(this).data('email')
        let dob = $(this).data('dob')
        let userRole = $(this).data('user-role')
        let address = $(this).data('address')
        let gender = $(this).data('gender')
        let fullname = $(this).data('fullname')
        
        $('#up_id').val(user_id)
        $('#fullname').val(fullname)
        $('#user-email').val(email)
        $('#user-role').val(userRole)
        $('#address').val(address)
        $('.gender').val(gender)
        $('#dob').val(dob)

        $(document).on('click','.update-user-btn',function(e){
            e.preventDefault()
            let userInput = document.getElementById('updateFormData')
            let formData = new FormData(userInput)
            
            $.ajax({
                url:"{{route('update-user')}}",
                method:"POST",
                contentType:false,
                processData:false,
                data:formData,
                success:function(res){
                    if (res.status == 200) {
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
                    }
                       
                    
                },
                error:function(error){
                    Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Something went wrong!",
                    footer: '<a href="#">Why do I have this issue?</a>'
                });
                    
                }
            })
            
          

        })
        



        
    })


    })



   
   
</script>