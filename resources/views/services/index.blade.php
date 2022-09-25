@extends('layouts.master')
@section('css')
<!--Internal  Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<script src='https://code.jquery.com/jquery-3.4.1.min.js' type='text/javascript'></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
    media="screen">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
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
<!-- row opened -->
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover" id="get_service" data-page-length='100' >
                        <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">Icon</th>
                                <th class="border-bottom-0">Title</th>
                                <th class="border-bottom-0">Description</th>
                                <th class="border-bottom-0">Processes</th>

                            </tr>
                        </thead>
{{--                        <tbody>--}}
{{--                            @foreach($services as $servicess)--}}
{{--                            <tr id="tr-{{ $servicess->id }}">--}}
{{--                                <td>{{ $servicess->id }}</td>--}}
{{--                                <td>--}}
{{--                                    <div class="media">--}}
{{--                                        <div class="card-aside-img">--}}
{{--                                            <img src="{{asset('uploads/'.$servicess->icon)}}" alt="img"--}}
{{--                                                style="width: 50px; height: 50px;">--}}
{{--                                        </div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <div class="card-item-desc mt-0">--}}
{{--                                                <h6 class="font-weight-semibold mt-0 text-uppercase"></h6>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                                <td>{{ $servicess->title_en }}</td>--}}
{{--                                <td>{{ $servicess->description_en }}</td>--}}
{{--                                <td>--}}
{{--                                    <a class="modal-effect btn btn-sm btn-info"--}}
{{--                                        href="{{ route('service.edite' , $servicess->id) }}">--}}
{{--                                        <i class="las la-pen"></i></a>--}}
{{--                                        <button id="a" type="submit" class="modal-effect btn btn-sm btn-danger" data-value="{{ $servicess->id }}"><i--}}
{{--                                                class="las la-trash"></i></button>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            @endforeach--}}
{{--                        </tbody>--}}
                    </table>

                </div>
                <div class="form-group mb-0 mt-3 justify-content-end">
                    <div>
                        <a href="{{ route('service.create') }}" class="btn btn-primary">Create</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{ $services->links() }}
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

    <script type='text/javascript'>
        $(document).ready(function () {
            var table = $('#get_service').DataTable({
                // processing: true,
                ajax: '{!! route('service.get_service') !!}',
                columns: [
                    {
                        'data': 'id',
                        'className': 'text-center text-lg text-medium'
                    },
                    {'data': 'icon' ,
                        'className': 'text-center text-lg text-medium' ,
                        render:function (data, row, type){
                            if(data){
                                return `<img src="{{ request()->getSchemeAndHttpHost().'/uploads/' }}${data}" style="width: 60px; height: 60px">`
                            }else {
                                return `<img src="{{ asset('admin/images/favicon.png') }}" class="h-60 w-60">`
                            }
                        }
                    },
                    {
                        'data': 'title_en',
                        'className': 'text-center text-lg text-medium'
                    },
                    {
                        'data': 'description_en',
                        'className': 'text-center text-lg text-medium'
                    },
                    {
                        'data': null,
                        render: function (data, row, type) {
                            return `<a class="modal-effect btn btn-sm btn-info" href="/admin/service/update/${data.id}"> <i class="las la-pen"></i></a>
                                            <button id="a" type="submit" class="modal-effect btn btn-sm btn-danger" data-value="${data.id}"><i class="las la-trash"></i></button>`;
                            },

                        },
                    ],
                });
                $('.table-responsive').addClass('col-sm-12');
            });
        </script>

        <script type='text/javascript'>
        $(document).ready(function() {
            console.log('dsadasdasd');
            $('#a').click(function(event) {
                event.preventDefault();
                var id = $(this).data('value');
                console.log(id);
                $.ajax({
                    url: "delete/"+id+"",
                    method: 'delete',
                    data: {
                        _token: '{{ csrf_token()}}'
                    },
                    success: function(d, b) {
                        console.log(b);
                        $('#tr-'+id).fadeOut(1000);
                    }.bind(this)
                });

            });
        });
        </script>
    @endsection
