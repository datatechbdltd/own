
    $(document).ready(function(){
        $(".logout-btn").click(function (){
            Swal.fire({
                title: 'Are you sure?',
                text: "You can login again in this system!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, logout it!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Logout!',
                        'Successfully logout from this system.',
                        'success'
                    )
                    setTimeout(function() {
                        document.getElementById('logout-form').submit();
                    }, 1000);//2 second
                }
            })
        });

        $(".password-change-btn").click(function (){
            Swal.fire({
                title: 'Do want to change your password ?',
                text: "If you change the password, use new password for further login!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0ccd27',
                cancelButtonColor: '#071b9b',
                confirmButtonText: 'Yes, change it!'
            }).then((result) => {
                if (result.value) {
                    var formData = new FormData();
                    formData.append('password', $('.new-password').val())
                    $.ajax({
                        method: 'POST',
                        url: "{{ route('changePassword') }}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: formData,
                        processData: false,
                        contentType: false,
                        beforeSend: function (){
                            $(".password-change-btn").prop("disabled",true);
                        },
                        complete: function (){
                            $(".password-change-btn").prop("disabled",false);
                        },
                        success: function (data) {
                            if (data.type == 'success'){
                                $('.new-password').val('')
                                Swal.fire(
                                    'Changed completed!',
                                    'Successfully password changed. Your new password is:'+data.password,
                                    'success'
                                );
                            }else{
                                Swal.fire({
                                    icon: data.type,
                                    title: 'Oops...',
                                    text: data.message,
                                    footer: 'Something went wrong!'
                                });
                            }
                        },
                        error: function (xhr) {
                            var errorMessage = '<div class="card bg-danger">\n' +
                                '                        <div class="card-body text-center p-5">\n' +
                                '                            <span class="text-white">';
                            $.each(xhr.responseJSON.errors, function(key,value) {
                                errorMessage +=(''+value+'<br>');
                            });
                            errorMessage +='</span>\n' +
                                '                        </div>\n' +
                                '                    </div>';
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                footer: errorMessage
                            });
                        },
                    });
                }
            })
        });
    });

