@extends('admin.master')

@section('title')
<title>Admin - Account</title>
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
					<h1 class="card-title float-left">Tài khoản người dùng</h1>
					<a href="{{route('users.create')}}" class="btn btn-teal btn-sm float-right"><i class="icon-plus22"></i> Thêm tài khoản</a>
				</div>

				<!-- <div class="card-body">
					Example of <code>togglable</code> columns table. These tables work off the concept of breakpoints. These can be customized, but the default breakpoints are: <code>phone: 480</code>, <code>tablet: 1024</code>. You then need to tell the table which columns to hide on which breakpoints, by specifying <code>data-hide</code> attributes on the table head columns.
				</div> -->

				<table class="table table-togglable table-hover datatable-responsive">
					<thead>
						<tr>
							<th data-breakpoints="xs sm">STT</th>
							<th data-breakpoints="xs sm">Avatar</th>
							<th data-breakpoints="xs sm">Email</th>
							<th data-breakpoints="xs sm">Tên</th>
							<th data-breakpoints="xs sm">Giới tính</th>
							<th data-breakpoints="xs sm md">Tài khoản</th>
							<th data-breakpoints="xs sm md" style="visibility: hidden;"></th>
							<th class="text-center" style="width: 30px;">Thao tác</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $key => $user)
						<tr>
							<td>
								{{$key+1}}
							</td>
							<td>
								<img src="{{$user['avt']??''}}" width="50px"/>
							</td>
							<td>
								{{$user['email']}}
							</td>
							<td>
								@if(isset($user['name']) && $user['name'] != "")
									<span class="badge badge-dark">{{$user['name']}}</span>
								@else
									<span class="badge badge-light">___</span>
								@endif
							</td>
							<td>
								@if(isset($user['gender']) && $user['gender'] == '1')
									<span class="badge badge-dark">Nam</span>
								@elseif(isset($user['gender']) && $user['gender'] == '0')
									<span class="badge badge-dark">Nữ</span>
								@else
									<span class="badge badge-light">___</span>
								@endif
							</td>
							<td>
								@if($user['admin'] == true)
									<span class="badge badge-dark">Admin</span>
								@else
									<span class="badge badge-light">Người dùng</span>
								@endif
							</td>
							<td>
								
							</td>
							<td class="text-center">
								<div class="btn-group">
									<a href="{{route('users.edit',$user['id'])}}" class="btn btn-light btn-icon btn-sm"><i class="icon-pencil3"></i></a>&nbsp;
									<form action="{{route('users.destroy',$user['id'])}}" method="post">
									@csrf
									@method('DELETE')
										<button type="submit" class="btn btn-light btn-icon btn-sm" onclick="if(!confirm('Bạn có chắc chắn xóa tài khoản này không ?')) return false;"><i class="icon-trash-alt"></i></button>
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