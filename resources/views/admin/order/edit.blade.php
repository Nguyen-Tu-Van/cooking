@extends('admin.master')

@section('title')
<title>Admin - Edit Tour</title>
@endsection

@section('js1')
<!-- editor -->
<script src="global_assets/js/plugins/editors/summernote/summernote.min.js?v=1"></script>

<!-- tag_input -->
<script src="global_assets/js/plugins/forms/tags/tagsinput.min.js"></script>
<script src="global_assets/js/plugins/forms/tags/tokenfield.min.js"></script>
<script src="global_assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
<script src="global_assets/js/plugins/ui/prism.min.js"></script>
@endsection

@section('js2')
<!-- editor -->
<script src="global_assets/js/demo_pages/editor_summernote.js"></script>

<!-- tag_input -->
<script src="global_assets/js/demo_pages/form_tags_input.js"></script>
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
                        <a href="{{route('foods.index')}}" class="breadcrumb-item">Foods</a>
                        <span class="breadcrumb-item active">Edit</span>
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
                    <h5 class="card-title">Edit tour</h5>
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
                    <form action="{{route('foods.update',$id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <fieldset class="mb-3">
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Thể loại <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <select class="form-control" name="type">
                                        <option>Tất cả</option>
                                        <option value="Sinh Thái" @if($tour['type']=='Sinh Thái') selected="selected" @endif>Sinh Thái</option>
                                        <option value="Văn hóa" @if($tour['type']=='Văn hóa') selected="selected" @endif>Văn hóa</option>
                                        <option value="Nghỉ Dưỡng" @if($tour['type']=='Nghỉ Dưỡng') selected="selected" @endif>Nghỉ Dưỡng</option>
                                        <option value="Giải Trí" @if($tour['type']=='Giải Trí') selected="selected" @endif>Giải Trí</option>
                                        <option value="Thể Thao" @if($tour['type']=='Thể Thao') selected="selected" @endif>Thể Thao</option>
                                        <option value="Khám Phá" @if($tour['type']=='Khám Phá') selected="selected" @endif>Khám Phá</option>
                                        <option value="Mạo Hiểm" @if($tour['type']=='Mạo Hiểm') selected="selected" @endif>Mạo Hiểm</option>
                                        <option value="Kết Hợp" @if($tour['type']=='Kết Hợp') selected="selected" @endif>Kết Hợp</option>
                                        <option value="Nước Ngoài" @if($tour['type']=='Nước Ngoài') selected="selected" @endif>Nước Ngoài</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Tên tour <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="title" value="{{$tour['title']}}">
                                </div>
                            </div>
							<div class="form-group row">
                                <label class="col-form-label col-lg-2">Chọn hình ảnh <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="imageUrl" oninput="document.getElementById('outputImg').src = this.value" value="{{$tour['imageUrl']}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Ảnh minh họa</label>
                                <div class="col-lg-10">
                                    <div>
                                        <img class="w-100" id="outputImg" src="{{$tour['imageUrl']}}" alt=""/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Nội dung tour <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="5" name="description">{{$tour['description']}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Giá <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                <input type="number" class="form-control" name="price" value="{{$tour['price']}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Hướng dẫn viên <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <select class="form-control" name="creatorId">
                                        @foreach($employees as $employee)
                                        <option value="{{$employee['id']}}" @if($employee['id']==$tour['creatorId']) selected="selected" @endif>{{$employee['name'].' - '.$employee['email']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </fieldset>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success"><i class="icon-arrow-right15"></i> Cập nhật</button>
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