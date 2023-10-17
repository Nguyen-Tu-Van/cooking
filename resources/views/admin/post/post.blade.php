@extends('admin.master')

@section('title')
<title>Admin - Post</title>
@endsection

@section('js1')
<!-- Table -->
<script src="global_assets/js/plugins/tables/footable/footable.min.js"></script>

<!-- button -->
<script src="global_assets/js/plugins/buttons/spin.min.js"></script>
<script src="global_assets/js/plugins/buttons/ladda.min.js"></script>

<script src="global_assets/js/plugins/ui/dragula.min.js"></script>
@endsection

@section('js2')
<!-- Table -->
<script src="global_assets/js/demo_pages/table_responsive.js"></script>

<!-- button -->
<script src="global_assets/js/demo_pages/components_buttons.js"></script>

<script src="global_assets/js/demo_pages/components_collapsible.js"></script>
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
					<h5 class="card-title float-left">Danh sách bài đăng của user</h5>
					<!-- <a href="{{route('foods.create')}}" class="btn btn-primary btn-sm float-right"><i class="icon-plus22"></i> Add</a> -->
				</div>

				<table class="table table-togglable table-hover">
					<thead>
						<tr>
							<th>STT</th>
							<th>Người đăng</th>
							<th data-breakpoints="xs sm md">Nội dung chi tiết bài đăng</th>
							<th data-breakpoints="xs sm md" style="width:400px">Comment</th>
							<th data-breakpoints="xs sm" class="text-center" style="width: 30px;"><i class="icon-menu-open2"></i></th>
						</tr>
					</thead>
					<tbody>
						@foreach($posts->sortByDesc('createDate') as $key => $post)
						<tr>
							<td>{{$key+1}}</td>
							<td>
								{{$users_arr[$post['userPost']]['email']}}
							</td>
							<td class="text-justify">
								{{$post['content']}}<br>
								<span class="badge badge-secondary">Create at {{convert_date($post['createDate'])}}</span>
								<i class="icon-heart5 text-danger"></i> {{count($post['like'])}}
							</td>
							<td>
								@if(count($post['comment'])>0)
									<div class="text-left">
										<span class="font-weight-semibold cursor-pointer text-primary" data-toggle="collapse" data-target="#collapse-text{{$key}}">
											Xem comment
										</span>
									</div>
									<div class="collapse" id="collapse-text{{$key}}">
										<div>
											@foreach($post['comment'] as $item)
											<span class="badge badge-primary">{{$users_arr[$item['idUser']]['email']}}</span> {{$item['content']}} <br>
											@endforeach
										</div>
									</div>
								@endif
							</td>
							<td class="text-center">
								<div class="btn-group">
									<form action="{{route('posts.destroy',$post['id'])}}" method="post">
									@csrf
									@method('DELETE')
										<button type="submit" class="btn btn-danger btn-icon btn-sm" onclick="if(!confirm('Bạn có chắc chắn xóa tour này không ?')) return false;"><i class="icon-trash"></i></button>
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