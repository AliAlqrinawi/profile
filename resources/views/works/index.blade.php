@extends('layouts.master')
@section('css')
    <!--Internal  Nice-select css  -->
    <link href="{{ URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet"/>
    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet"/>

@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">show</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                Services</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('works.modal-from')
    <!-- row opened -->
    <div class="row">
        <div class="col-sm-12 stretch-card">
            <div class="card">
                <div class="card-header">
                    <h3>Works
                        <a href="#" class="btn btn-primary float-right" id="ShowModalAddWork">Add
                            Work</a>
                    </h3>
                </div>
                <div class="card-body">
                    <x-flash-massage/>
                    <div id="error_message"></div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="table-responsive hoverable-table">
                        <table class="table table-hover" id="get_works" data-page-length='100'>
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">{{ trans('Title') }}</th>
                                <th class="border-bottom-0">{{ trans('Categores') }}</th>
                                <th class="border-bottom-0">{{ trans('Processes') }}</th>
                            </tr>
                            </thead>
                            {{--                                <tbody>--}}
                            {{--                                @foreach($works as $work)--}}
                            {{--                                    <tr id="al-{{ $work->id }}">--}}
                            {{--                                        <td>{{ $work->id }}</td>--}}
                            {{--                                        <td>{{ $work->title_en }}</td>--}}
                            {{--                                        <td>{{ $work->has_categores->name_en }}</td>--}}
                            {{--                                        <td>--}}
                            {{--                                            <a class="modal-effect btn btn-sm btn-info"--}}
                            {{--                                               href="{{ route('work.edite' , $work->id) }}">--}}
                            {{--                                                <i class="las la-pen"></i></a>--}}

                            {{--                                            <button id="ali-{{ $work->id }}" class="modal-effect btn btn-sm btn-danger"--}}
                            {{--                                                    data-value="{{ $work->id }}"><i class="las la-trash"></i></button>--}}
                            {{--                                        </td>--}}
                            {{--                                    </tr>--}}
                            {{--                                @endforeach--}}
                            {{--                                </tbody>--}}
                            <tfoot>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">{{ trans('Title') }}</th>
                                <th class="border-bottom-0">{{ trans('Categores') }}</th>
                                <th class="border-bottom-0">{{ trans('Processes') }}</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--    {{ $works->links() }}--}}
@endsection
@section('js')
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/select2.js')}}"></script>
    <!-- Internal Nice-select js-->
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
    {{--    @foreach($works as $work)--}}
    {{--        <script type='text/javascript'>--}}
    {{--            $(document).ready(function () {--}}
    {{--                console.log('dsadasdasd');--}}
    {{--                $('#ali-{{ $work->id }}').click(function (event) {--}}
    {{--                    event.preventDefault();--}}
    {{--                    var id = $(this).data('value');--}}
    {{--                    console.log(id);--}}
    {{--                    $.ajax({--}}
    {{--                        url: "{{ route('work.destroy' , $work->id) }}",--}}
    {{--                        method: 'delete',--}}
    {{--                        data: {--}}
    {{--                            _token: '{{ csrf_token()}}'--}}
    {{--                        },--}}
    {{--                        success: function (d, b) {--}}
    {{--                            console.log(b);--}}
    {{--                            $('#al-{{ $work->id }}').fadeOut(3000);--}}
    {{--                        }.bind(this)--}}
    {{--                    });--}}

    {{--                });--}}
    {{--            });--}}
    {{--        </script>--}}
    {{--    @endforeach--}}
    <script type="text/javascript">
        // Create DataTable to Works
        var table = $('#get_works').DataTable({
            // processing: true,
            ajax: '{!! route('work.get_works') !!}',
            columns: [
                {
                    'data': 'id',
                    'className': 'text-center text-lg text-medium'
                },
                {
                    'data': 'title_en',
                    'className': 'text-center text-lg text-medium'
                },
                {
                    'data': 'has_categores.name_en',
                    'className': 'text-center text-lg text-medium'
                },
                {
                    'data': null,
                    render: function (data, row, type) {
                        return `<button class="modal-effect btn btn-sm btn-info" id="ShowModalEditWork" data-id="${data.id}"><i class="las la-pen"></i></button>
                                <button class="modal-effect btn btn-sm btn-danger" id="DeleteWork" data-id="${data.id}"><i class="las la-trash"></i></button>`;
                    },
                    orderable: false,
                    searchable: false
                },
            ],
        });
        // Create Works
        $(document).on('click', '#ShowModalAddWork', function (e) {
            e.preventDefault();
            $('#ModalAddWork').modal('show');
            $('.AddWork').click(function (e) {
                e.preventDefault();
                let formdata = new FormData($('#FormAddWork')[0]);

                // console.log(formdata.get('images[]'));
                // var data = {
                //     title_en : $('#add_title_word').val(),
                //     title_ar : $('#add_title_ar_word').val(),
                //     id_category  : $('#add_category_word').val(),
                //     images : $('#add_images_word').val(),
                // };
                // // console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    enctype: 'multipart/form-data',
                    url: '/admin/works',
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.status == 400) {
                            // errors
                            $('#list_error_message').html("");
                            $('#list_error_message').addClass("alert alert-danger");
                            $.each(response.errors, function (key, error_value) {
                                $('#list_error_message').append('<li>' + error_value + '</li>');
                            });
                        } else {
                            $('.AddWork').text('Saving');
                            $('#error_message').html("");
                            $('#error_message').addClass("alert alert-success");
                            $('#error_message').text(response.message).fadeOut(3000);
                            $('#ModalAddWork').modal('hide');
                            $('#FormAddWork')[0].reset();
                            table.ajax.reload();
                        }
                    }
                });
            });
        });
        //  view modification data
        $(document).on('click', '#ShowModalEditWork', function (e) {
            e.preventDefault();
            var id_work = $(this).data('id');
            // console.log(id_work);
            $('#ModalEditWork').modal('show');

            $.ajax({
                type: 'GET',
                url: '/admin/works/edite/' + id_work,
                data: "",
                success: function (response) {
                    console.log(response);
                    if (response.status == 404) {
                            console.log('error');
                            $('#error_message').html("");
                            $('#error_message').addClass("alert alert-danger");
                            $('#error_message').text(response.message);
                        } else {
                            $('#id_work').val(id_work);
                    $('#edit_title_word').val(response.work.title_en);
                    $('#edit_title_ar_word').val(response.work.title_ar);
                    $('#edit_category_word').val(response.work.id_category);
                    // console.log(response.attachments.length());

                    let host = '{{ request()->getSchemeAndHttpHost().'/uploads/' }}';
                    // $('#iiiii').attr('src' , host+""+response.attachments[0].images);
                    // console.log(response.attachments.length );
                    var len = 0, attachments = response.attachments.length;
                    // for (len = 0; len <= attachments; len++) {
                    // console.log(len);
                    // console.log(response.attachments[len].images);
                    // $('.ss').after(`<div class="d-inline">
                    // <button type="submit" class="modal-effect btn btn-sm btn-danger">
                    // <i class="las la-trash"></i>
                    // </button> <img src="`+ host+response.attachments[len].images +`" id="iiiii"
                    // alt="img" style="width: 60px; height: 60px; margin: 10px;">
                    // </div>
                    // </div>`);
                    $.each(response.attachments, function (key, value) {
                        // if (value.images){
                        $('.ss').after(`
                                <div class="delete${value.id}" style="display: inline;">
                                <button type="submit"
                                        class="modal-effect btn btn-sm btn-danger" id="destroy_attachments" data-id = "${value.id}"><i class="las la-trash"></i></button>
                                <div class="card-aside-img d-inline">
                                    <img src="${host + value.images}" id="iiiii" alt="img" style="width: 60px; height: 60px; margin: 10px;">
                                </div>
                            </div>`);
                        //     }
                        // else{
                        //         $('.ss').after(`<p>This Work have'nt Images</p>`);
                        //     }
                    });
                    // }
                        }
             
                }
            });
        });
        // Edit Works
        $(document).on('click', '.EditWork', function (e) {
            e.preventDefault();
            var data = {
                title_en : $('#edit_title_word').val(),
                title_ar : $('#edit_title_ar_word').val(),
                id_category : $('#edit_category_word').val(),
                images : $('#edit_images_word').val(),
            };
            var id_work = $('#id_work').val();
            // console.log(id_work);
            // console.log(formdata.get('title_ar'));
            console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'PUT',
                url: '/admin/works/update/' + id_work,
                data: data,
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    if (response.status == 400) {
                        // errors
                        $('#list_error_messagee').html("");
                        $('#list_error_messagee').addClass("alert alert-danger");
                        $.each(response.errors, function (key, error_value) {
                            $('#list_error_messagee').append('<li>' + error_value + '</li>');
                        });
                    } else if (response.status == 404) {
                        $('#error_message').html("");
                        $('#error_message').addClass("alert alert-danger");
                        $('#error_message').text(response.message);
                    } else {
                        $('.AddWork').text('Saving');
                        $('#error_message').html("");
                        $('#error_message').addClass("alert alert-success");
                        $('#error_message').text(response.message).fadeOut(3000);
                        $('#ModalEditWork').modal('hide');
                        // $('#FormEditWork')[0].reset();
                        table.ajax.reload();
                    }
                }
            });
        });
        // Destroy attachments
        $(document).on('click', '#destroy_attachments', function (e) {
            e.preventDefault();
            var id_attachment = $(this).data('id');
            // console.log(id_attachment);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/admin/attachment/destroy/" + id_attachment,
                method: 'DELETE',
                data: "",
                success: function (d, b) {
                    console.log('success');
                    $('.delete' + id_attachment).hide();
                }.bind(this)
            });
        });
        // Destroy Works
        $(document).on('click', '#DeleteWork', function (e) {
            e.preventDefault();
            var id_word = $(this).data('id');
            // console.log(id_word);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'DELETE',
                url: '/admin/works/destroy/' + id_word,
                data: '',
                contentType: false,
                processData: false,
                success: function (response) {
                    // console.log('success');
                    $('#error_message').html("");
                    $('#error_message').addClass("alert alert-success");
                    $('#error_message').text(response.message).fadeOut(3000);
                    table.ajax.reload();
                }
            });
        });
    </script>
@endsection