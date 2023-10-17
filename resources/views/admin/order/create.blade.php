@extends('admin.master')

@section('title')
<title>Admin - Create Tour</title>
@endsection

@section('js1')
<!-- editor -->
<script src="global_assets/js/plugins/editors/summernote/summernote.min.js?v=1"></script>

<!-- tag_input -->
<script src="global_assets/js/plugins/forms/tags/tagsinput.min.js"></script>
<script src="global_assets/js/plugins/forms/tags/tokenfield.min.js"></script>
<script src="global_assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
<script src="global_assets/js/plugins/ui/prism.min.js"></script>

<script src="global_assets/js/plugins/forms/inputs/duallistbox/duallistbox.min.js"></script>
@endsection

@section('js2')
<!-- editor -->
<script src="global_assets/js/demo_pages/editor_summernote.js"></script>

<!-- tag_input -->
<script src="global_assets/js/demo_pages/form_tags_input.js"></script>
<script src="global_assets/js/demo_pages/form_dual_listboxes.js"></script>
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
                        <a href="{{route('foods.index')}}" class="breadcrumb-item">Food</a>
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
                    <h5 class="card-title">Tạo tour mới</h5>
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
                    <form action="{{route('foods.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                        <fieldset class="mb-3">
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Thể loại <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <select class="form-control" name="type">
                                        <option>Tất cả</option>
                                        <option value="Sinh Thái">Sinh Thái</option>
                                        <option value="Văn hóa">Văn hóa</option>
                                        <option value="Nghỉ Dưỡng">Nghỉ Dưỡng</option>
                                        <option value="Giải Trí">Giải Trí</option>
                                        <option value="Thể Thao">Thể Thao</option>
                                        <option value="Khám Phá">Khám Phá</option>
                                        <option value="Mạo Hiểm">Mạo Hiểm</option>
                                        <option value="Kết Hợp">Kết Hợp</option>
                                        <option value="Nước Ngoài">Nước Ngoài</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Tên tour <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="title" value="{{old('title')??''}}">
                                </div>
                            </div>
							<div class="form-group row">
                                <label class="col-form-label col-lg-2">Image Url  <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="imageUrl" oninput="document.getElementById('outputImg').src = this.value" value="{{old('imageUrl')??''}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Ảnh minh họa</label>
                                <div class="col-lg-10">
                                    <div>
                                        <img class="w-100" id="outputImg" src="" alt=""/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Nội dung tour <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="5" name="description">{{old('description')??''}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Giá <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                <input type="number" class="form-control" name="price" value="{{old('price')??''}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Hướng dẫn viên <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <select class="form-control" name="creatorId">
                                        @foreach($employees as $employee)
                                        <option value="{{$employee['id']}}">{{$employee['name'].' - '.$employee['email']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </fieldset>

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