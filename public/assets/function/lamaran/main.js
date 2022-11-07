function getData() {
    $.ajax({
        type: "get",
        url: "/lamaran/render",
        dataType: "json",
        success: function (response) {
            $(".render").html(response.data);
        },
        error: function (error) {
            console.log("Error", error);
        },
    });
}

function tambah() {
    $.ajax({
        type: "get",
        url: "/lamaran/create",
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

    $('body').on('click', '.btn-add', function () {
        tambah();
    });

    $('body').on('click', '.btn-data', function () {
        getData();
    });

    // on save button
    $('body').on('click', '.btn-update', function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let form = $('#formStatus')[0]
        let data = new FormData(form)
        $.ajax({
            type: "POST",
            url: "/lamaran/update",
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
                $('#modalStatus').modal('hide');
                getData();
                Swal.fire(
                    response.title,
                    response.message,
                    response.status
                );
            },
            error: function (error) {
                Swal.fire(
                    error.title,
                    error.message,
                    error.status
                );
            }
        });
    });

    $('body').on('change', '.status', function() {
        let status = $(this).val();
        if(status == 1) {
            $('#keterangan').val('');
            $('.keterangan-group').hide()
        } else {
            $('.keterangan-group').show()
        }
    });

    $('body').on('click', '.btn-edit', function () {
        let id = $(this).data('id')
        let status = $(this).data('status');
        let keterangan = $(this).data('keterangan');
        $('#modalStatus').modal('show')
        $('input[name=lamaran_id]').val(id)
        $('.status').val(status)
        status == 1 ? $('.keterangan-group').hide() : $('.keterangan-group').show()
        $('#keterangan').html(keterangan)
    });
});