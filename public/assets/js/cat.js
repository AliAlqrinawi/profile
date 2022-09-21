$(document).ready(function () {
    var table = $('#get_categories').DataTable({
        // processing: true,
        ajax: 'http://localhost:8000/get_categories',
        columns: [
            {
                'data': 'id',
                'className': 'text-center text-lg text-medium'
            },
            {
                'data': 'name_en',
                'className': 'text-center text-lg text-medium'
            },
            {
                'data': 'name_ar',
                'className': 'text-center text-lg text-medium'
            },
            {
                'data': 'created_at',
                'className': 'text-center text-lg text-medium',
                render: function (data) {
                    if (data == null) return "";
                    var date = new Date(data);
                    var month = date.getMonth() + 1;
                    return date.getDate() + "/" + (month.toString().length > 1 ? month : "0" + month) + "/" + date.getFullYear();
                }
            },
            {
                'data': null,
                render: function (data, row, type) {
                    return `<a class="modal-effect btn btn-sm btn-info EditeCategory" data-id="${data.id}" href="#"><i class="las la-pen"></i></a>
                                <button class="modal-effect btn btn-sm btn-danger DeleteCategory" data-id="${data.id}"><i class="las la-trash"></i></button>`;
                },
                orderable: false,
                searchable: false
            },
        ],
    });
    $('.table-responsive').addClass('col-sm-12');
    $('#form-categore').submit(function (event) {
        event.preventDefault();
        var formdata = new FormData($(this)[0]);

        $.ajax({
            url: '/categores/works',
            method: 'post',
            data: formdata,
            processData: false,
            contentType: false,
            success: function (data, b) {
                if (data.success) {
                    jQuery('.alert-success').hide();
                    jQuery('.alert-danger').show();
                    jQuery('.alert-danger').removeClass('alert-danger').addClass('alert-info');
                    jQuery('.alert-info').append('<p>' + data.success + '</p>').fadeOut(4000);
                    table.ajax.reload();
                    $(this)[0].reset();
                    $('.table-responsive').addClass('col-sm-12');
                }
                jQuery.each(data.error, function (key, value) {
                    jQuery('.alert-danger').show();
                    jQuery('.alert-danger').append('<p>' + value + '</p>').fadeOut(10000);
                });
                // $('#m').before(
                //     '<tr>' +
                //     '<th>' + data[0].id + '</th>' +
                //     '<td>' + data[0].name_ar + '</td>' +
                //     '<td>' + data[0].name_en + '</td>' +
                //     '<td>' + data[0].created_at + '</td>' +
                //     '<td>' +
                //     '<a class="modal-effect btn btn-sm btn-info" href="update/' + data[0].id + '">' +
                //     '<i class="las la-pen"></i></a>' +
                //     '<form action="" method="POST">' +
                //     '<button id="a" type="submit" class="modal-effect btn btn-sm btn-danger">' +
                //     '<i class="las la-trash">' +
                //     '</i ></button>' +
                //     '</form></td>' +
                //     '</tr>');
            }.bind(this),
            error: function (a, f) {
                console.log(a, f);
            }

        });

    });
    $(document).on('click' , '.DeleteCategory' , function (e){
        e.preventDefault();
        var id_category = $(this).data('id');
        // console.log(id_category);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'delete',
            url: 'destroy/'+id_category,
            data:"",
            success:function (data){
                table.ajax.reload();
                $('.message').text(data.success).show().fadeOut(1000);

                // console.log("delete");
            },
        });
    });
    $(document).on('click' , '.EditeCategory' , function (e){
        e.preventDefault();
        var id_category = $(this).data('id');
        // console.log(id_category);
        $('#editeCategoryModal').modal('show');
        $.ajax({
            type: 'GET',
            url: 'edit/' + id_category,
            data: '',
            success: function (response) {
                // console.log(response);
                if (response.status == 404) {
                    console.log('error');
                    $('#error_message').html("");
                    $('#error_message').addClass("alert alert-danger");
                    $('#error_message').text(response.message);
                } else {
                    console.log('success');
                    $('#edit_Category_id').val(id_category);
                    $('#edit_Category_name_en').val(response.Category.name_en);
                    $('#edit_Category_name_ar').val(response.Category.name_ar);
                }
            }
        });
    });
    $(document).on('click' , '.UpdateCategory' , function (e){
        e.preventDefault();
        var id_Category = $('#edit_Category_id').val();
        // console.log(id_Category);
        var data = {
            name_en : $('#edit_Category_name_en').val(),
            name_ar : $('#edit_Category_name_ar').val(),
        };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'PUT',
            url: '/categores/update/'+id_Category,
            data: data,
            dataType: 'json',
            success: function (response) {
                if (response.status == 400) {
                    // errors
                    $('#list_error_message').html("");
                    $('#list_error_message').addClass("alert alert-danger");
                    $.each(response.errors, function (key, error_value) {
                        $('#list_error_message').append('<li>' + error_value + '</li>');
                    });
                } else if (response.status == 404) {
                    $('#error_message').html("");
                    $('#error_message').addClass("alert alert-danger");
                    $('#error_message').text(response.message);
                } else {
                    $('.UpdateCategory').text('Updating');
                    $('#error_message').html("");
                    $('#error_message').addClass("alert alert-success");
                    $('#error_message').text(response.message);
                    $('#editeCategoryModal').modal('hide');
                    table.ajax.reload();
                }
            }
        });
    });
});
