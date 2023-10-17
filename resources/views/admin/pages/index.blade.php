@extends('admin.master')

@section('title')
<title>Dashboard - Thống kê</title>
@endsection

@section('js1')
<script src="global_assets/js/plugins/visualization/d3/d3.min.js"></script>
<script src="global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
<script src="global_assets/js/plugins/ui/moment/moment.min.js"></script>
<script src="global_assets/js/plugins/pickers/daterangepicker.js"></script>
@endsection

@section('js2')
<script src="global_assets/js/demo_pages/dashboard.js"></script>
<script src="global_assets/js/demo_charts/pages/dashboard/light/streamgraph.js"></script>
<script src="global_assets/js/demo_charts/pages/dashboard/light/sparklines.js"></script>
<script src="global_assets/js/demo_charts/pages/dashboard/light/lines.js"></script>	
<script src="global_assets/js/demo_charts/pages/dashboard/light/areas.js"></script>
<script src="global_assets/js/demo_charts/pages/dashboard/light/donuts.js"></script>
<script src="global_assets/js/demo_charts/pages/dashboard/light/bars.js"></script>
<script src="global_assets/js/demo_charts/pages/dashboard/light/progress.js"></script>
<script src="global_assets/js/demo_charts/pages/dashboard/light/heatmaps.js"></script>
<script src="global_assets/js/demo_charts/pages/dashboard/light/pies.js"></script>
<script src="global_assets/js/demo_charts/pages/dashboard/light/bullets.js"></script>

<script src="global_assets/js/demo_pages/widgets_stats.js"></script>
@endsection

@section('content')
<div class="content-wrapper">

    <!-- Inner content -->
    <div class="content-inner">

		<div class="content">
			<!-- Stats with progress -->
			<div class="mb-3 pt-2">
				<h6 class="mb-0 font-weight-semibold">
					Thống kê chung
				</h6>
			</div>

			<div class="row">

				<div class="col-sm-6 col-xl-4 p-3">

					<!-- Productivity goal  -->
					<div class="card card-body text-center">
						<div class="svg-center position-relative" id="progress_icon_two"></div>
						<h2 class="progress-percentage mt-2 mb-1 font-weight-semibold">{{$num_user}}</h2>

						Số tài khoản
					</div>
					<!-- /productivity goal -->

				</div>

				<div class="col-sm-6 col-xl-4 p-3">

					<!-- Orders processed -->
					<div class="card card-body text-center  has-bg-image">
						<div class="svg-center position-relative" id="progress_icon_three"></div>
						<h2 class="progress-percentage mt-2 mb-1 font-weight-semibold">{{$num_product}}</h2>

						Số món ăn
					</div>
					<!-- /orders processed -->

				</div>

				<div class="col-sm-6 col-xl-4 p-3">

					<!-- Order shipped -->
					<div class="card card-body text-center has-bg-image">
						<div class="svg-center position-relative" id="progress_icon_four"></div>
						<h2 class="progress-percentage mt-2 mb-1 font-weight-semibold">{{$num_order}}</h2>

						Số đơn đặt hàng
					</div>
					<!-- /orders shipped -->

				</div>
					<div class="col-sm-12 col-xl-12 p-3">
						<div class="card card-body bg-dark text-white has-bg-image">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-0">{{number_format($money1, 0, ',', '.')}} vnđ</h3>
									<span class="text-uppercase font-size-xs">Tổng doanh thu</span>
								</div>

								<div class="ml-3 align-self-center">
									<i class="fas fa-dollar-sign icon-3x opacity-75"></i>
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-4 col-xl-4 p-3">
						<div class="card card-body bg-light text-black has-bg-image">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-0">{{number_format($money2, 0, ',', '.')}} vnđ</h3>
									<span class="text-uppercase font-size-xs">Doanh thu ngày hôm nay</span>
								</div>
								<div class="mr-3 align-self-center">
									<i class="fas fa-dollar-sign icon-3x opacity-75"></i>
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-4 col-xl-4 p-3">
						<div class="card card-body bg-light text-black has-bg-image">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-0">{{number_format($money3, 0, ',', '.')}} vnđ</h3>
									<span class="text-uppercase font-size-xs">Doanh thu tháng nay</span>
								</div>

								<div class="ml-3 align-self-center">
									<i class="fas fa-dollar-sign icon-3x opacity-75"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-xl-4 p-3">
						<div class="card card-body bg-light text-black has-bg-image">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-0">{{number_format($money4, 0, ',', '.')}} vnđ</h3>
									<span class="text-uppercase font-size-xs">Doanh thu năm nay</span>
								</div>

								<div class="ml-3 align-self-center">
									<i class="fas fa-dollar-sign icon-3x opacity-75"></i>
								</div>
							</div>
						</div>
					</div>
			</div>

			<!-- /stats with progress -->
			<!-- Simple statistics -->
			<div class="mb-3">
				<h6 class="mb-0 font-weight-semibold">
					Thống kê đơn đặng hàng
				</h6>
			</div>

			<div class="row">
				<div class="col-sm-6 col-xl-4 p-3">
					<div class="card card-body bg-light text-black has-bg-image">
						<div class="media">
							<div class="media-body">
								<h3 class="mb-0">{{$status1}} đơn</h3>
								<span class="text-uppercase font-size-xs">Chờ duyệt</span>
							</div>

							<div class="ml-3 align-self-center">
								<i class="icon-cart icon-3x opacity-75"></i>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-xl-4 p-3">
					<div class="card card-body bg-light text-black has-bg-image">
						<div class="media">
							<div class="media-body">
								<h3 class="mb-0">{{$status2}} đơn</h3>
								<span class="text-uppercase font-size-xs">Đã duyệt</span>
							</div>
                            <div class="mr-3 align-self-center">
								<i class="icon-cart icon-3x opacity-75"></i>
							</div>
						</div>
					</div>
				</div>

                <div class="col-sm-6 col-xl-4 p-3">
					<div class="card card-body bg-light text-black has-bg-image">
						<div class="media">
							<div class="media-body">
								<h3 class="mb-0">{{$status3}} đơn</h3>
								<span class="text-uppercase font-size-xs">Đã hủy</span>
							</div>

							<div class="ml-3 align-self-center">
								<i class="icon-cart icon-3x opacity-75"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- /simple statistics -->

		</div>

    </div>
    <!-- /inner content -->
</div>
@endsection