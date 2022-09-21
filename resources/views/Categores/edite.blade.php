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
<!-- row opened -->
<div class="row row-sm">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">Categores Form</h4>
                </div>
                <div class="card-body pt-0">
                    <x-flash-massage />
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal" action="{{ route('categore.update' , $categorey->id) }}" method="POST">
						@csrf
                        @method('put')
                        <div class="form-group">
                            <input type="text" value="{{ $categorey->name_ar }}" class="form-control" id="inputName" name="name_ar" placeholder="Name Categorey in Arabic">
                        </div>
						<div class="form-group">
                            <input type="text" value="{{ $categorey->name_en }}" class="form-control" id="inputName" name="name_en" placeholder="Name Categorey">
                        </div>
                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" class="btn btn-primary">edite</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('js')
@endsection
