
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
    })
   
</script>