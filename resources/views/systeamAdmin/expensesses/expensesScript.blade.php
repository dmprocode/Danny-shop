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

    $('#add-expensses').on('click', function(e){
      e.preventDefault()
      let expensesFormData = new FormData(document.getElementById('expensesFormData'));
      console.log(expensesFormData);
      
    })

  })





</script>