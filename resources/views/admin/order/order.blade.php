@extends('admin.master')

@section('title')
<title>Admin - Order</title>
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

@section('css')
<style>
	td{
		padding: 5px !important;
	}
</style>
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
					@if(isset($_GET['date']))
						<h1 class="card-title float-left">Doanh thu {{$_GET['date']}} là {{number_format($money, 0, ',', '.')}} vnđ</h1>
					@else
						<h1 class="card-title float-left">Danh sách đơn đặt hàng</h1>
					@endif
					<form class="float-right" style="display: flex;" action="{{route('orders.index')}}" method="get">
						<input type="date" class="form-control mr-2" name="date" value="{{$_GET['date']??''}}">
						<button type="submit" class="btn btn-primary btn-sm" style="width:120px"><i class="icon-filter3"></i> Filter</button>
					</form>
					<!-- <a href="{{route('foods.create')}}" class="btn btn-primary btn-sm float-right"><i class="icon-plus22"></i> Add</a> -->
				</div>

				<!-- <div class="card-body">
					Example of <code>togglable</code> columns table. These tables work off the concept of breakpoints. These can be customized, but the default breakpoints are: <code>phone: 480</code>, <code>tablet: 1024</code>. You then need to tell the table which columns to hide on which breakpoints, by specifying <code>data-hide</code> attributes on the table head columns.
				</div> -->

				<table class="table table-togglable table-hover datatable-responsive">
					<thead>
						<tr>
							<th>#</th>
							<th>Thông tin khách</th>
							<th>Tổng tiền</th>
							<th data-breakpoints="xs sm md">Trạng thái</th>
							<th data-breakpoints="xs sm">Món ăn</th>
							<th data-breakpoints="xs sm">Thông tin chi tiết</th>
							<th data-breakpoints="xs sm" class="text-center" style="width: 30px;"><i class="icon-menu-open2"></i></th>
						</tr>
					</thead>
					<tbody>
						@php
							if(isset($_GET['date']))
							{
								$orders = $orders1;
							}
						@endphp
						@foreach($orders as $key => $order)
						<tr>
							<td class="text-center">{{$key+1}}</td>
							<td>
								<b>Email</b> : {{$order['user']['email']}}<br>
								<b>Tên</b> : {{$order['order']['ten']}}<br>
								<b>SĐT</b> : {{$order['order']['sdt']}}<br>
							</td>
							<td>{{number_format($order['order']['amount'], 0, ',', '.')}} vnđ</td>
							<td  class="text-center">
								@if($order['order']['orderStatus'] == 'Đang giao')
									<span class="badge badge-light">{{$order['order']['orderStatus']}}</span>
								@elseif($order['order']['orderStatus'] == 'Đã giao')
									<span class="badge badge-success">{{$order['order']['orderStatus']}}</span>
								@else
									<span class="badge badge-danger">{{$order['order']['orderStatus']}}</span>
								@endif
								<br>
								@if($order['order']['orderStatus'] == 'Đang giao')
									<a href="{{route('approve',$order['id'])}}" class="btn btn-indigo btn-sm mt-1 p-1 pt-0 pb-0">Duyệt</a>&nbsp;
									<a href="{{route('remove',$order['id'])}}" class="btn btn-dark btn-sm mt-1 p-1 pt-0 pb-0">Hủy</a>&nbsp;
								@endif
							</td>
							<td>
								@foreach($order['order']['products'] as $address)
								<div style="display: flex;">
									<div>
										<img width="80" src="{{$address['imageUrl']}}" /> 
									</div>
									<div style="display: flex;align-items: center;">
										{{$address['title']}} - giá {{number_format($address['price'], 0, ',', '.')}} vnđ x {{$address['quantity']}}
									</div>
								</div>
								@endforeach
							</td>
							<td>
								<span class="badge badge-success mt-1">Thanh toán lúc {{convert_date($order['order']['time_payment'])}}</span> 
							</td>
							<td class="text-right">
								<div class="btn-group">
									<form action="{{route('orders.destroy',$order['id'])}}" method="post">
									@csrf
									@method('DELETE')
										<button type="submit" class="btn btn-danger btn-icon btn-sm" onclick="if(!confirm('Bạn có chắc chắn xóa order này không ?')) return false;"><i class="icon-trash"></i></button>
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

	<!-- Scrollable modal show-->
	<div id="modal_show" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header pb-0">
					<h4 class="modal-title" v-if="display==1">Chỉnh sửa tour</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- <div class="pace-demo" style="margin:0 auto" v-if="display==0">
					<div class="theme_squares">
						<div class="pace-progress" data-progress-text="60%" data-progress="60"></div>
						<div class="pace_activity" style="width:0"></div>
					</div>
				</div> -->
				<div class="modal-body py-0">
					<hr/>
					<div class="card-body">
						<form action="{{route('update')}}" method="post" enctype="multipart/form-data">
						@csrf
						@method('POST')
							<div class="row">
								<fieldset class="mb-3 col-lg-12">
									<input type="hidden" class="form-control" name="orderId" id="orderId">
									<div class="form-group row">
										<label class="col-form-label col-lg-3">Ngày đi <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="date" class="form-control" name="startDate" id="startDate">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-3">Ngày về <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="date" class="form-control" name="endDate" id="endDate">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-3">Số người <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="numberPeople" id="numberPeople">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-3">Phòng <span class="text-danger">*</span></label>
										<div class="col-lg-9 pt-2">
											<label class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="room1" name="room" value="1" checked >
												<span class="custom-control-label">đơn</span>
											</label>
											<label class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="room2" name="room" value="2" >
												<span class="custom-control-label">nhóm</span>
											</label>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-3">Thanh toán <span class="text-danger">*</span></label>
										<div class="col-lg-9 pt-2">
											<label class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="payment1" name="payment" value="0" checked >
												<span class="custom-control-label">Chưa thanh toán</span>
											</label>
											<label class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="payment2" name="payment" value="1" >
												<span class="custom-control-label">Đã thanh toán</span>
											</label>
										</div>
									</div>
								</fieldset>
							</div>

							<div class="text-center">
								<button type="submit" class="btn btn-success"><i class="icon-arrow-right15"></i> Cập nhật</button>
								<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /scrollable modal show-->

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
	function showInfoTour(a,b,c,d,id,payment) {
		document.getElementById('startDate').value = a;
		document.getElementById('endDate').value = b;
		document.getElementById('numberPeople').value = c;
		if(d>1)
		{
			document.getElementById('room2').checked = true;
		}
		else
		{
			document.getElementById('room1').checked = true;
		}
		if(payment==0)
		{
			document.getElementById('payment1').checked = true;
		}
		else
		{
			document.getElementById('payment2').checked = true;
		}
		document.getElementById('orderId').value = id;
	}
</script>
@endsection