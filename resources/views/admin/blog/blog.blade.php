@extends('admin.master')

@section('title')
<title>Admin - Món ăn</title>
@endsection

@section('js1')
<script src="global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script src="global_assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
<!-- Table -->
<script src="global_assets/js/plugins/tables/footable/footable.min.js"></script>

<!-- button -->
<script src="global_assets/js/plugins/buttons/spin.min.js"></script>
<script src="global_assets/js/plugins/buttons/ladda.min.js"></script>
@endsection

@section('js2')
<script src="global_assets/js/demo_pages/datatables_responsive.js"></script>
<!-- Table -->
<script src="global_assets/js/demo_pages/table_responsive.js"></script>

<!-- button -->
<script src="global_assets/js/demo_pages/components_buttons.js"></script>
@endsection

@section('content')
<div class="content-wrapper">

	<!-- Inner content -->
	<div class="content-inner">

		<!-- Content area -->
		<div class="content">

			<!-- Table with togglable columns -->
			<div class="card">
				<div class="card-header">
					<h1 class="card-title float-left">Danh sách món ăn</h1>
					<a href="{{route('foods.create')}}" class="btn btn-teal btn-sm float-right"><i class="icon-plus22"></i> Thêm món</a>
				</div>

				<!-- <div class="card-body">
					Example of <code>togglable</code> columns table. These tables work off the concept of breakpoints. These can be customized, but the default breakpoints are: <code>phone: 480</code>, <code>tablet: 1024</code>. You then need to tell the table which columns to hide on which breakpoints, by specifying <code>data-hide</code> attributes on the table head columns.
				</div> -->

				<table class="table table-togglable table-hover datatable-responsive">
					<thead>
						<tr>
							<th>#</th>
							<th>Hình ảnh</th>
							<th>Thông tin món ăn</th>
							<th data-breakpoints="xs sm md">Giá</th>
							<th data-breakpoints="xs sm">Mô tả món ăn</th>
							<th data-breakpoints="xs sm">Nguyên liệu</th>
							<th data-breakpoints="xs sm" class="text-center" style="width: 30px;">Thao tác</th>
						</tr>
					</thead>
					<tbody>
						@foreach($tours as $key => $tour)
						<tr>
							<td>{{$key+1}}</td>
							<td width="280px">
								<div style="position: absolute;background-color: black;color:red;opacity: 0.8;padding: 2px 5px;font-weight: bold;border-radius: 5%;">
								<i class="icon-heart6 text-danger"></i> {{count($favorites_arr[$tour['favoriteId']]['userIds'])}}
								</div>
								<img width="250px" src="{{$tour['imageUrl']}}"/>
							</td>
							<td style="width:250px">
								<b>Món ăn :</b> {{$tour['title']}}
								<br>
								<b>Thể loại</b> : {{$tour['type']}}
								<br>
								<b>Thời gian nấu</b> : {{$tour['time']??''}}
								<br>
								<b>Người đăng</b> : {{$users[$tour['creatorId']]['email']??''}}
								<br>
								@if(isset($users[$tour['creatorId']]['admin']) && $users[$tour['creatorId']]['admin']==1)
								<span class="badge badge-success">Is_Admin</span>
								@else 
								<span class="badge badge-light">Is_User</span>
								@endif
							</td>
							<td style="width:150px">{{number_format($tour['price'], 0, ',', '.')}} vnđ</td>
							<td style="text-align: justify;">
								<textarea class="form-control" rows="5" name="description" readonly>{{$tour['description']}}</textarea>
							</td>
							<td style="text-align: justify;">
								<textarea class="form-control" style="width:200px" rows="5" name="ingredient" readonly>{{$tour['ingredient']??''}}</textarea>
							</td>
							<td class="text-center">
								<div class="btn-group">
									<a href="{{route('foods.edit',$tour['id'])}}" class="btn btn-light btn-icon btn-sm"><i class="icon-pencil3"></i></a>&nbsp;
									<form action="{{route('foods.destroy',$tour['id'])}}" method="post">
									@csrf
									@method('DELETE')
										<button type="submit" class="btn btn-light btn-icon btn-sm" onclick="if(!confirm('Bạn có chắc chắn xóa món ăn này không ?')) return false;"><i class="icon-trash-alt"></i></button>
									</form>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<!-- /table with togglable columns -->

		</div>
		<!-- /content area -->

	</div>
	<!-- /inner content -->

</div>

@endsection

@section('addjs')
<script>
    function destroyBlogId(id) {
		if(!confirm('Bạn có chắc chắn muốn xóa bài viết này không ?')) return false;
		else{
			$("#blogId").val(id);
			$('#categoryForm').submit();
		}
	}
</script>
@endsection