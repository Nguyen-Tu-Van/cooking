@extends('admin.master')

@section('title')
<title>Admin - Account</title>
@endsection

@section('js1')
<!-- Table -->
<script src="global_assets/js/plugins/tables/footable/footable.min.js"></script>

<!-- button -->
<script src="global_assets/js/plugins/buttons/spin.min.js"></script>
<script src="global_assets/js/plugins/buttons/ladda.min.js"></script>
@endsection

@section('js2')
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
					<h5 class="card-title float-left">Hướng dẫn viên du lịch</h5>
					<a href="{{route('employees.create')}}" class="btn btn-primary btn-sm float-right"><i class="icon-plus22"></i> Add</a>
				</div>

				<!-- <div class="card-body">
					Example of <code>togglable</code> columns table. These tables work off the concept of breakpoints. These can be customized, but the default breakpoints are: <code>phone: 480</code>, <code>tablet: 1024</code>. You then need to tell the table which columns to hide on which breakpoints, by specifying <code>data-hide</code> attributes on the table head columns.
				</div> -->

				<table class="table table-togglable table-hover">
					<thead>
						<tr>
							<th data-breakpoints="xs sm">STT</th>
							<th data-breakpoints="xs sm">Email</th>
							<th data-breakpoints="xs sm md">Tên</th>
							<th data-breakpoints="xs sm md">Số điện thoại</th>
							<th data-breakpoints="xs sm md">Vai trò</th>
							<th class="text-center" style="width: 30px;"><i class="icon-menu-open2"></i></th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $key => $user)
						<tr>
							<td>
								{{$key+1}}
							</td>
							<td>
								{{$user['email']}}
							</td>
							<td>
								{{$user['name']}}
							</td>
							<td>
								{{$user['phone']}}
							</td>
							<td>
								<span class="badge badge-light">Hướng dẫn viên</span>
							</td>
							<td class="text-center">
								<div class="btn-group">
									<a href="{{route('employees.edit',$user['id'])}}" class="btn btn-success btn-icon btn-sm"><i class="icon-pencil"></i></a>&nbsp;
									<form action="{{route('employees.destroy',$user['id'])}}" method="post">
									@csrf
									@method('DELETE')
										<button type="submit" class="btn btn-danger btn-icon btn-sm" onclick="if(!confirm('Bạn có chắc chắn xóa hướng dẫn viên này không ?')) return false;"><i class="icon-trash"></i></button>
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
    function destroyUserId(id) {
		if(!confirm('Bạn có chắc chắn muốn xóa tài khoản này không ?')) return false;
		else{
			$("#userId").val(id);
			$('#slideForm').submit();
		}
	}
</script>
@endsection