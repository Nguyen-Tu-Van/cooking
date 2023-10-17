@extends('admin.master')

@section('title')
<title>Admin - Create</title>
@endsection

@section('js1')
@endsection

@section('js2')
@endsection

@section('content')
<div class="content-wrapper">

    <!-- Inner content -->
    <div class="content-inner">

        <!-- Page header -->
        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                        <a href="{{route('users.index')}}" class="breadcrumb-item">Tài khoản</a>
                        <span class="breadcrumb-item active">Add</span>
                    </div>

                    <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">

            <!-- Form inputs -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Tạo tài khoản</h5>
                </div>

                @if(count($errors)>0)
                    @foreach($errors->all() as $value)
                    <div class="alert alert-danger border-0 alert-dismissible m-1">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        <span class="font-weight-semibold">{{$value}}</span>
                    </div>
                    @endforeach
				@endif

                <div class="card-body">
                    <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                        <div class="row">
                            <fieldset class="mb-3 col-lg-12">
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3">Email <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="email" value="{{old('email')??''}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3">Password <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="" class="form-control" name="password" value="{{old('password')??''}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3">Admin <span class="text-danger">*</span></label>
                                    <div class="col-lg-9 pt-2">
                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" name="status" value="1" checked="">
                                            <span class="custom-control-label">Yes</span>
                                        </label>
                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" name="status" value="0">
                                            <span class="custom-control-label">No</span>
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary"><i class="icon-arrow-right15"></i> Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /form inputs -->

        </div>
        <!-- /content area -->


    </div>
    <!-- /inner content -->

</div>
@endsection

@section('addjs')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#outputImg').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#inputImg").change(function() {
        readURL(this);
    });
</script>
@endsection