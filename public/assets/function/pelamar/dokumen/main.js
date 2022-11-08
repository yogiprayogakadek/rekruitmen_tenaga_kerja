function getData() {
    $.ajax({
        type: "get",
        url: "/dokumen/render",
        dataType: "json",
        success: function (response) {
            $(".render").html(response.data);
        },
        error: function (error) {
            console.log("Error", error);
        },
    });
}
$(document).ready(function () {
    getData();
    
    // UPLOAD DOCUMENT
    $('body').on('click', '.btn-upload', function() {
        let pelamarId = $(this).data('id');
        let document = $(this).data('document');
        let title = document.replace(/_/g, ' ');
        
        $('#modalUpload').modal('show');

        $('#modalUpload').find('.modal-title').addClass('capitalize')
        $('#modalUpload').find('.modal-title').html('Unggah dokumen scan ' + title);
        $('input[name="pelamar_id"]').val(pelamarId)
        $('input[name="document"]').val(document)
    });

    // process upload
    $('body').on('click', '.process-upload', function (e) {
        let form = $('#formUpload')[0]
        let data = new FormData(form)
        $.ajax({
            type: "POST",
            url: "/dokumen/store",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function () {
                $('.process-upload').attr('disable', 'disabled')
                $('.process-upload').html('<i class="fa fa-spin fa-spinner"></i>')
            },
            complete: function () {
                $('.process-upload').removeAttr('disable')
                $('.process-upload').html('Save')
            },
            success: function (response) {
                $('#modalUpload').modal('hide');
                Swal.fire(
                    response.title,
                    response.message,
                    response.status
                );
                $('#formUpload').trigger('reset')
                getData();
            },
            error: function (error) {
                // 
            }
        });
    });

    // on update button
    $('body').on('click', '.btn-update', function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let form = $('#formEdit')[0]
        let data = new FormData(form)
        $.ajax({
            type: "POST",
            url: "/pelamar/update",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function () {
                $('.btn-update').attr('disable', 'disabled')
                $('.btn-update').html('<i class="fa fa-spin fa-spinner"></i>')
            },
            complete: function () {
                $('.btn-update').removeAttr('disable')
                $('.btn-update').html('Save')
            },
            success: function (response) {
                $('#formEdit').trigger('reset')
                $(".invalid-feedback").html('')
                getData();
                Swal.fire(
                    response.title,
                    response.message,
                    response.status
                );
            },
            error: function (error) {
                let formName = []
                let errorName = []

                $.each($('#formEdit').serializeArray(), function (i, field) {
                    formName.push(field.name.replace(/\[|\]/g, ''))
                });
                if (error.status == 422) {
                    if (error.responseJSON.errors) {
                        $.each(error.responseJSON.errors, function (key, value) {
                            errorName.push(key)
                            if($('.'+key).val() == '') {
                                $('.' + key).addClass('is-invalid')
                                $('.error-' + key).html(value)
                            }
                        })
                        $.each(formName, function (i, field) {
                            $.inArray(field, errorName) == -1 ? $('.'+field).removeClass('is-invalid') : $('.'+field).addClass('is-invalid');
                        });
                    }
                }
            }
        });
    });

});