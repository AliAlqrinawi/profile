@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">show</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                admins</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <!-- Shopping Cart-->
                <div class="product-details table-responsive text-nowrap">
                    <h3 class="text-center">{{ trans('clients') }}</h3>
                    <table class="table table-bordered table-hover mb-0 text-nowrap" id="get_clients">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Created</th>
                            </tr>
                        </thead>
{{--                        @foreach($clients as $client)--}}
{{--                        <tbody>--}}
{{--                            <tr>--}}
{{--                                <td class="text-center text-lg text-medium">{{ $client->id }}</td>--}}
{{--                                <td class="text-center text-lg text-medium">{{ $client->name }}</td>--}}
{{--                                <td class="text-center text-lg text-medium">{{ $client->email }}</td>--}}
{{--                                <td class="text-center text-lg text-medium">{{ $client->description }}</td>--}}
{{--                                <td>--}}
{{--                                    <div class="media">--}}
{{--                                        <div class="card-aside-img">--}}
{{--                                            <img src="{{asset('uploads/'.$client->image)}}" alt="img" class="h-60 w-60">--}}
{{--                                        </div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <div class="card-item-desc mt-0">--}}
{{--                                                <h6 class="font-weight-semibold mt-0 text-uppercase"></h6>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                                <td class="text-center text-lg text-medium">{{ $client->created_at }}</td>--}}
{{--                            </tr>--}}
{{--                        </tbody>--}}
{{--                        @endforeach--}}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{ $clients->links() }}
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
    <script>
        var table = $('#get_clients').DataTable({
            // processing: true,
            ajax: '{!! route('get_client') !!}',
            columns: [
                {'data': 'id' ,
                    'className': 'text-center text-lg text-medium'},
                {'data': 'name' ,
                    'className': 'text-center text-lg text-medium'},
                {'data': 'email' ,
                    'className': 'text-center text-lg text-medium'},
                {'data': 'description' ,
                    'className': 'text-center text-lg text-medium'},
                {'data': 'image' ,
                    'className': 'text-center text-lg text-medium' ,
                    render:function (data, row, type){
                        if(data){
                            return `<img src="{{ request()->getSchemeAndHttpHost().'/uploads/' }}${data}" class="h-40 w-60">`
                        }else {
                            return `<img src="{{ asset('admin/images/favicon.png') }}" class="h-60 w-60">`
                        }
                    }
                },
                {
                    'data': 'created_at' ,
                    'className': 'text-center text-lg text-medium' ,
                    render: function (data) {
                        if (data == null) return "";
                        var date = new Date(data);
                        var month = date.getMonth() + 1;
                        return date.getDate() + "/"  + (month.toString().length > 1 ? month : "0" + month) + "/"  + date.getFullYear();
                    }},
            ],
        });
        $('.table-responsive').addClass('col-12');
    </script>
@endsection
