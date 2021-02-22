
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
    });

    function delete_function(objButton){
        var url = objButton.value;
        // alert(objButton.value)
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: 'DELETE',
                    url: url,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (data) {
                        if (data.type == 'success'){
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            setTimeout(function() {
                                location.reload();
                            }, 800);//
                        }else{
                            Swal.fire(
                                'Wrong!',
                                'Something going wrong.',
                                'warning'
                            )
                        }
                    },
                })
            }
        })
    }

    function change_category(objButton){
        var formData = new FormData();
        formData.append('lead', objButton.value)
        $.ajax({
            method: 'POST',
            url: "/lead/lead/get/category",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                console.log(data);
                var modal_body_html='<div class="row">';
                for (i=0; i<data.categories.length; i++){
                    modal_body_html += data.categories[i];
                }
                $('#category').html(modal_body_html);
                $('#hidden-value').val(objButton.value);
                $('#modal').modal('show');
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

