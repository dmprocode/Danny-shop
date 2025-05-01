<script>
  $(document).ready(function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('#expenses-form-div').hide()




    document.getElementById('make-expenses').addEventListener('click', function () {
      const originalContent = this.innerHTML;
      this.innerHTML = '<span class="fs-5">⏳ Please wait...</span>';

      setTimeout(() => {
        this.innerHTML = originalContent;
      }, 3000);

      $('#expenses-form-div').show();
      $('#expenses-table').hide();
    });


    $(document).on('click','#go-make-expenses',function(e){
      e.preventDefault()
      $('#expenses-form-div').hide();
      $('#expenses-table').show();
    })

    

  })


  $('#add-expensses').on('click', function(e){
      e.preventDefault()
       $('.message').html(''); 
       let expensesFormData = new FormData($('#expensesFormData')[0]);      $.ajax({
        url:"{{route('add-expensess')}}",
        method:"POST",
        contentType:false,
        processData:false,
        data:expensesFormData,
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
          
          $('.amouthMSG').html(error.responseJSON.errors.amouth)
          $('.dscMSG').html(error.responseJSON.errors.disc)
          $('.dateMSG').html(error.responseJSON.errors.date)

        }
      })
    })





</script>