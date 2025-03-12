<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#capital-form').hide()
        $('#update-capital-form').hide()


        $(document).on('click', '.add-capital', function (e) {
            e.preventDefault()
            $('#capital-form').show()
            $('#capital-table').hide()
        })
        $(document).on('click', '.go-back-btn', function (e) {
            e.preventDefault()
            $('#capital-form').hide()
            $('#capital-table').show()
        })
        $(document).on('click', '.add-capital-btn', function (e) {
            e.preventDefault()
            $('.message').html('')
            $('#capital-form').show()
            $('#capital-table').hide()


            $.ajax({
                url: "{{ route('check-capital-status') }}", // Your Laravel route
                method: "GET",
                success: function (res) {
                    if (res.status == 600) {
                        $('#capitalValue').prop('disabled', true); // Disable button
                        $('.message').html('<span class="text-danger">You already have capital. Cannot add more.</span>');
                    } else {
                        $('#capitalValue').prop('disabled', true); // Enable button
                        $('#capital-form').show();
                        $('#capital-table').hide();
                    }
                },
                error: function () {
                    
                }
            });
        });

        // Function to check capital on page load
        function checkCapital() {
            $.ajax({
                url: "{{ route('check-capital-status') }}",
                method: "GET",
                success: function (res) {
                    if (res.capital > 0) {
                        $('.add-capital-btn').prop('disabled', true); // Disable button
                        $('.message').html('<span class="text-danger">You already have capital. Cannot add more.</span>');
                    }
                }
            });
        }


    })

    $(document).on('click', '#capitalValue', function (e) {
        e.preventDefault()
        let userInput = document.getElementById('userFormData');
        let userFormDateails = new FormData(userInput);
        $.ajax({
            url: "{{route('add-capital-initial')}}",
            method: "POST",
            contentType: false,
            processData: false,
            data: userFormDateails,
            success: function (res) {
                console.log(res);
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
            error: function (error) {
                if (error) {
                    $('.start_amount').html(error.responseJSON.errors.start_amount)
                    $('.userRole').html(error.responseJSON.errors.userRole)

                }

            }



        })
    })

    $(document).on('click', '.edit-capital', function (e) {
        $('#capital-table').hide()
        $('#update-capital-form').show()
        e.preventDefault()
        let id = $(this).data('id');
        let start_amouth = $(this).data('start_amount');
        let update_amount = $(this).data('update_amount');
        let fullname = $(this).data('fullname');
        let user_id = $(this).data('user');



        $('#start_amouth').val(start_amouth)
        $('#up_id').val(id)
        $('#addedBy').val(fullname)
        $('#update_amouth').val(update_amount)
        $('#user_id').val(user_id)

    })


    $(document).on('click', '.up-capital-btn', function (e) {
        e.preventDefault()
        let userData = document.getElementById('up-userFormData')
        let userInput = new FormData(userData);
        $.ajax({
            url: "{{route('update-capital')}}",
            method: "POST",
            contentType: false,
            processData: false,
            data: userInput,
            success: function (res) {
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
            error: function (error) {
                console.log(error);

            }


        })

    })

    $(document).on('click', '.change-capital-btn', function (e) {
        e.preventDefault()
        $('.messsage').html('')
        let changeAmouth = document.getElementById('changeCapital');
        let amouth = new FormData(changeAmouth)
        $.ajax({
            url: "{{route('add-capital')}}",
            method: "POST",
            contentType: false,
            processData: false,
            data: amouth,
            success: function (res) {                
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: res.message,
                    showConfirmButton: false,
                    timer: 1500,
                   
                });
                setTimeout(() => {
                        location.reload()
                    }, 1500);

            },
            error: function (error) {
                console.log(error);
                $('.change-amouth').html(error.responseJSON.errors.change_amouth)
                $('.userRole').html(error.responseJSON.errors.userRole)
            }
        })

    })


    







</script>