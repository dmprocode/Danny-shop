<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
       

 
        
    })
 $('#add-customer-div').hide()
 $(document).on('click','.add-customer-btn',function(e){
    e.preventDefault()
    $('#customer-table').hide()
    $('#add-customer-div').show()
 })

 $(document).on('click','.go-back-btn', function(e){
    e.preventDefault()
    $('#customer-table').show()
    $('#add-customer-div').hide() 
})

$(document).on('click','#add_customer', function(e){
    e.preventDefault()
    $('.message').html('')
    let customerName = $('#customer_name').val()
    let phonenumber = $('#phone_number').val()

    $.ajax({
        url:"{{route('add-product')}}",
        method:"POST",
        data:{
            customerName:customerName,
            phonenumber:phonenumber
            
        },
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
            console.log(error);
            $('.customer-name').html(error.responseJSON.errors.customerName)
            $('.phone-number').html(error.responseJSON.errors.phonenumber)
            
        }
    

    })
     
})

</script>