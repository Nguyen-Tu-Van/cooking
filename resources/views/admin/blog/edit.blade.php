@extends('admin.master')

@section('title')
<title>Admin - Edit Món ăn</title>
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
                        <a href="{{route('foods.index')}}" class="breadcrumb-item">Món ăn</a>
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
                    <h5 class="card-title">Edit Món ăn</h5>
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
                                        <option value="Nướng" @if($tour['type']=='Nướng') selected="selected" @endif>Nướng</option>
                                        <option value="Canh" @if($tour['type']=='Canh') selected="selected" @endif>Canh</option>
                                        <option value="Xào" @if($tour['type']=='Xào') selected="selected" @endif>Xào</option>
                                        <option value="Hấp" @if($tour['type']=='Hấp') selected="selected" @endif>Hấp</option>
                                        <option value="Bánh" @if($tour['type']=='Bánh') selected="selected" @endif>Bánh</option>
                                        <option value="Nguội" @if($tour['type']=='Nguội') selected="selected" @endif>Khám Phá</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Tên món ăn <span class="text-danger">*</span></label>
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
                                <label class="col-form-label col-lg-2">Mô tả món ăn <span class="text-danger">*</span></label>
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
                        </fieldset>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success"><i class="icon-arrow-right15"></i> Cập nhật</button>
                        </div>
                        <hr>
                        <h5 class="card-title">Nội dung bình luận</h5>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2" style="font-weight: bold !important;"> Email <span class="text-danger"></span></label>
                            <label class="col-form-label col-lg-9" style="font-weight: bold !important;">
                                Nội dung bình luận
                            </label>
                            <label class="col-form-label col-lg-1" style="font-weight: bold !important;">
                                Xóa
                            </label>
                        </div>
                        @if(isset($comment_arr[$id]))
                            @foreach($comment_arr[$id]['comment'] as $key => $item)
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2"> {{$users_arr[$item['userCommentId']]['email']}} <span class="text-danger"></span></label>
                                <label class="col-form-label col-lg-9">
                                    {{$item['content']}}
                                </label>
                                <label class="col-form-label col-lg-1">
                                    <div class="btn-group">
                                        <form action="{{route('remove_comment',[$id,$key])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-icon btn-sm" onclick="if(!confirm('Bạn có chắc chắn xóa comment này không ?')) return false;"><i class="icon-trash"></i></button>
                                        </form>
                                    </div>
                                </label>
                            </div>
                            @endforeach
                            @endif
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