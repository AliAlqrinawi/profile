@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Create</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                Categores</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Categores.modal-from')
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">Categores Form</h4>
                </div>
                <x-flash-massage/>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body pt-0">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="alert alert-info" style="display: none"></div>
                    <form id="form-categore" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputName" name="name_ar"
                                   placeholder="Name Categorey in Arabic">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputName" name="name_en"
                                   placeholder="Name Categorey">
                        </div>
                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" id="form-categore1" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive hoverable-table">
                        <table class="table table-hover" id="get_categories" data-page-length='100'>
                            <div class="alert alert-success message" style="display:none"></div>
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">Name En</th>
                                <th class="border-bottom-0">Name Ar</th>
                                <th class="border-bottom-0">Created</th>
                                <th class="border-bottom-0">Processes</th>
                            </tr>
                            </thead>
{{--                            @foreach($categores as $category)--}}
{{--                                <tbody>--}}
{{--                                <tr id="al-{{ $category->id }}">--}}
{{--                                    <th>{{ $category->id }}</th>--}}
{{--                                    <td>{{ $category->name_en }}</td>--}}
{{--                                    <td>{{ $category->name_ar }}</td>--}}
{{--                                    <td>{{ $category->created_at }}</td>--}}
{{--                                    <td>--}}
{{--                                        <a class="modal-effect btn btn-sm btn-info"--}}
{{--                                           href="{{ route('categore.edite' , $category->id) }}">--}}
{{--                                            <i class="las la-pen"></i></a>--}}
{{--                                        <button id="ali-{{ $category->id }}" class="modal-effect btn btn-sm btn-danger"--}}
{{--                                                data-value="{{ $category->id }}"><i class="las la-trash"></i></button>--}}
{{--                                    </td>--}}

{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            @endforeach--}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    {{ $categores->links() }}--}}
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
    <script src="{{URL::asset('assets/js/cat.js')}}"></script>

{{--    @foreach($categores as $work)--}}
{{--        <script type='text/javascript'>--}}
{{--            $(document).ready(function () {--}}
{{--                console.log('dsadasdasd');--}}
{{--                $('#ali-{{ $work->id }}').click(function (event) {--}}
{{--                    event.preventDefault();--}}
{{--                    $.ajax({--}}
{{--                        url: "{{ route('categore.destroy' , $work->id) }}",--}}
{{--                        method: 'delete',--}}
{{--                        data: {--}}
{{--                            _token: '{{ csrf_token()}}'--}}
{{--                        },--}}
{{--                        success: function (data, b) {--}}
{{--                            console.log(data);--}}
{{--                            $('#al-{{ $work->id }}').fadeOut(3000);--}}
{{--                            if (data.success) {--}}
{{--                                jQuery('.alert-info').show();--}}
{{--                                jQuery('.alert-info').append('<p>' + data.success + '</p>').fadeOut(4000);--}}
{{--                            }--}}
{{--                        }.bind(this)--}}
{{--                    });--}}

{{--                });--}}
{{--            });--}}
{{--        </script>--}}
{{--    @endforeach--}}

@endsection
