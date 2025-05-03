<script>
  $(document).ready(function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('#expenses-form-div').hide()
    $('#up-expenses-form-div').hide()



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
      $("#up-expenses-form-div").hide()

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


    $(document).on('click', '.expenses-id', function(e) {
    e.preventDefault();
    let expenses_id = $(this).data('id');
    
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
                url: "{{ route('delete-expenses') }}",
                method: "POST",
                data: {
                    expenses_id: expenses_id,
                    _token: "{{ csrf_token() }}" // Don't forget CSRF token
                },
                success: function(res) {
                    Swal.fire({
                        title: "Deleted!",
                        text: res.message || "Your expense has been deleted.",
                        icon: "success"
                    }).then(() => {
                        // Optional: Refresh the page or update the UI
                        location.reload(); // or your custom refresh logic
                    });
                },
                error: function(error) {
                    Swal.fire({
                        title: "Error!",
                        text: error.responseJSON.message || "Something went wrong",
                        icon: "error"
                    });
                    console.log(error);
                }
            });
        }
    });
});


$(document).on('click', '.expenses-edit-id', function(e){
  e.preventDefault()
  let edit_id =  $(this).data('id');
  let amount =  $(this).data('amount');
  let description = $(this).data('description');
  console.log(amount);
  


  $('#up_id').val(edit_id)
  $('#up_disc').val(description)
  $('.up_amouth').val(amount)
  $("#up-expenses-form-div").show()
  $('#expenses-table').hide()
  
  
})



// Add hover effects via JS (no custom CSS)
document.getElementById('update-expenses').addEventListener('mouseenter', function() {
    this.style.transform = 'translateY(-3px)';
    this.style.boxShadow = '0 10px 20px rgba(0, 180, 180, 0.4)';
    this.querySelector('span:last-child').style.transform = 'scaleX(1)';
  });
  
  document.getElementById('update-expenses').addEventListener('mouseleave', function() {
    this.style.transform = '';
    this.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.1)';
    this.querySelector('span:last-child').style.transform = 'scaleX(0)';
  });

  
$(document).on('click','#update-expenses', function(e){
  e.preventDefault()
  let ex_Id = $('#up_id').val()
  let disc= $('#up_disc').val()
  let  amouth = $('.up_amouth').val()
  

  $.ajax({
    url :"{{route('update-expeses')}}",
    method:"POST",
    data:{
      ex_Id:ex_Id,
      disc:disc,
      amouth:amouth
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
      
    }
  })
})



</script>