@extends('layouts.master')
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!---Internal Fileupload css-->
<link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css" />
<!---Internal Fancy uploader css-->
<link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
<!--Internal Sumoselect css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css')}}">
<!--Internal  TelephoneInput css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css')}}">
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Settings</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                General</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row row-sm">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
        <div class="card  box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1">Default Form</h4>
                <p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>
            </div>

            <div class="card-body pt-0">
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
                <form class="form-horizontal" method="POST" action="{{ route('work.store') }}"
                    autocomplete="off" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="site_title">Title in Arabic:</label>
                        <div class="col-md-10">
                            <textarea id="site_title" name="title_en" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="site_title">Title:</label>
                        <div class="col-md-10">
                            <textarea id="site_title" name="title_ar" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Category:</label>
                        <div class="col-md-10">
                            <select name="id_category" id="select-beast" class="form-control  nice-select  custom-select">
                                <option value=""></option>
                                @foreach($category as $category)
                                <option value="{{ $category->id }}">{{ $category->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">images:</label>
                        <div class="col-md-10">
                        <input id="" type="file" name="images[]" accept="image/*" multiple>
                        </div>
                    </div>
                    <div class="form-group mb-0 mt-3 justify-content-end">
                        <div>
                            <button type="submit" class="btn btn-primary">Edite</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Fileuploads js-->
<script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
<!--Internal Fancy uploader js-->
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
<!--Internal  Form-elements js-->
<script src="{{URL::asset('assets/js/advanced-form-elements.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<!--Internal Sumoselect js-->
<script src="{{URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
<!-- Internal TelephoneInput js-->
<script src="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
<script src="{{URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>
@endsection
