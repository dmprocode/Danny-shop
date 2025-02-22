<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



    })
$(document).on('click', '#login-btn', function(e){
    e.preventDefault();
    $('.login-btn').html('Please Wait <div class="spinner-grow spinner-grow-sm" role="status"></div>')
    let logiForm = document.getElementById('loginForm')
    let loginDetails = new FormData(logiForm)

    $.ajax({
        url:"{{route('login-form')}}",
        method:"post",
        contentType:false,
        processData:false,
        data:loginDetails,
        success:function(res){
            console.log(res);
            
        },
        error:function(error){
            console.log(error);
            
        }
    })
   
});


</script>