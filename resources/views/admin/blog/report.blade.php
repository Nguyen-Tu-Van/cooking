@extends('admin.master')

@section('title')
<title>Admin - Report</title>
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
					<h1 class="card-title float-left">Danh sách report</h1>
				</div>

				<!-- <div class="card-body">
					Example of <code>togglable</code> columns table. These tables work off the concept of breakpoints. These can be customized, but the default breakpoints are: <code>phone: 480</code>, <code>tablet: 1024</code>. You then need to tell the table which columns to hide on which breakpoints, by specifying <code>data-hide</code> attributes on the table head columns.
				</div> -->

				<table class="table table-togglable table-hover datatable-responsive">
					<thead>
						<tr>
							<th data-breakpoints="xs sm">STT</th>
							<th data-breakpoints="xs sm">Hình ảnh</th>
							<th data-breakpoints="xs sm">Món ăn</th>
							<th data-breakpoints="xs sm md">Nội dung report</th>
							<th data-breakpoints="xs sm md">Tài khoản report</th>
							<th data-breakpoints="xs sm md">Status</th>
							<th class="text-center" style="width: 30px;">Thao tác</th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $item)
							@if(isset($item['reports']) && count($item['reports']) > 0)
								@foreach($item['reports'] as $key => $user)
								<tr>
									<td>
										{{count($item['reports'])}}
									</td>
									<td>
										<img width="150px" src="{{$item['imageUrl']}}"/>
									</td>
									<td style="width:220px">
										<b>Món ăn :</b> {{$item['title']}}
										<br>
										<b>Thể loại</b> : {{$item['type']}}
									</td>
									<td>
										{{$user['content']}}
									</td>
									<td>
										{{$user['email']}}
									</td>
									<td>
										@if($user['status']==0)
											<span class="text-danger">Đã từ chối report</span>
										@elseif($user['status']==1)
											<span class="text-success">Chấp nhận report</span>
										@else  
											<span class="">Chờ duyệt</span>
										@endif
									</td>
									<td class="text-center">
										@if($user['status']==2)
											<div class="btn-group">
												<a href="{{route('update_status',[$item['id'],$key,0])}}" class="btn btn-danger btn-icon btn-sm" style="width: 100px;"><i class="icon-close2">Từ chối</i></a>
												<a href="{{route('update_status',[$item['id'],$key,1])}}" class="btn btn-success btn-icon btn-sm" style="width: 100px;"><i class="icon-ticket">Chấp nhận</i></a>
											</div>
										@else 
											<div class="btn-group">
												<a href="{{route('update_status',[$item['id'],$key,2])}}" class="btn btn-light btn-icon btn-sm" style="width: 120px;"><i class="icon-undo">Chờ duyệt</i></a>
											</div>
										@endif
									</td>
								</tr>
								@endforeach
							@endif
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