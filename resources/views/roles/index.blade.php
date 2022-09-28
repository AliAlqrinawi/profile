@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Create</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
            roles</span>
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
            <div class="card-header">
                <h3>roles
                    <a href="{{ route('roles.create') }}" class="btn btn-primary float-right">Add
                        roles</a>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover" id="get_categories" data-page-length='100'>
                        <div class="alert alert-success message" style="display:none"></div>
                        <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">Permission Name</th>
                                <th class="border-bottom-0">User Name</th>
                                <th class="border-bottom-0">Permissions</th>
                                <th class="border-bottom-0">Count</th>
                                <th class="border-bottom-0">Created</th>
                                <th class="border-bottom-0">Processes</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($roles as $role)
                            <td>{{ $role->id }}</td>
                            <!-- <td><a href="{{ route ('roles.show' ,  $role->id) }}">{{ $role->name }}</a></td> -->
                            <td>{{ $role->name }}</td> <!-- if one argument passed direct -->
                            <td>{{ $role->users[0]->name }}</td>
                            <td>
                                [
                                @foreach($role->permissions as $permissions)
                                {{ '"'.$permissions.'",' }}
                                @endforeach
                                ]
                            </td>
                            <td>{{ $role->users_count }}</td>
                            <td>{{ $role->created_at  }}</td>
                            <td><a href="{{ route('roles.edit' , $role->id) }}" class="btn btn-warning" style="width: 60xp; text-align: center; display: inline;">Edit</a>

                                <form action=" {{ route('roles.destroy' , $role->id) }}"  method="post" style="width: 60xp; text-align: center; display: inline;" > 
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                    <button class="btn btn-danger" >Delete</button>
                                </form>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

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
@endsection