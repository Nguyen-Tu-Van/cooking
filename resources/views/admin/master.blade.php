<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{asset('')}}">
    @yield('title')
	<!-- Global stylesheets -->
	<link rel="shortcut icon" type="image/x-icon" href="https://play-lh.googleusercontent.com/V5e9THQ3KaTFIv7zJ0ZC4_8s1p3b2UEm-39jpwNPhYNAdB1FuM0httrU5cwsxq_JJ54" />
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="common/css/style.css?v=3" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

    @yield('css')

	<!-- Core JS files -->
	<script src="global_assets/js/main/jquery.min.js"></script>
	<script src="global_assets/js/main/bootstrap.bundle.min.js"></script>

    @yield('js1')
	<script src="global_assets/js/plugins/loaders/blockui.min.js"></script>
	<script src="global_assets/js/plugins/ui/prism.min.js"></script>

	<!-- Theme JS files -->
	<script src="assets/js/app.js"></script>

	<!-- Toastr -->
	<script src="global_assets/js/plugins/notifications/jgrowl.min.js"></script>
	<script src="global_assets/js/plugins/notifications/noty.min.js"></script>
    @yield('js2')
	<!-- Toastr -->
	<script src="global_assets/js/demo_pages/extra_jgrowl_noty.js"></script>

</head>

<body>

	<!-- Header -->
    @include('admin.layouts.header')
	<!-- /Header -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Menu -->
        @include('admin.layouts.menu')
		<!-- /Menu -->


		<!-- Content -->
        @yield('content')
		<!-- /Content -->

	</div>
	<!-- /page content -->

	@yield('content2')

    <!-- @yield('addjs') -->
	
	<script src="common/js/main.js?v=2"></script>
	<script src="common/js/convert_number.js"></script>

	@yield('addjs')


	<script>
		Noty.overrideDefaults({
			theme: 'limitless',
			layout: 'topRight',
			type: 'alert',
			timeout: 2500
		});
	</script>
	@if(session('success'))
	<script>
		new Noty({
			text: '{{session("success")}}',
			type: 'success',
			closeWith: ['button']
		}).show();
	</script>
	@elseif(session('error'))
	<script>
		new Noty({
			text: '{{session("error")}}',
			type: 'error',
			closeWith: ['button']
		}).show();
	</script>
	@elseif(session('warning'))
	<script>
		new Noty({
			text: '{{session("warning")}}',
			type: 'warning',
			closeWith: ['button']
		}).show();
	</script>
	@elseif(session('info'))
	<script>
		new Noty({
			text: '{{session("info")}}',
			type: 'info',
			closeWith: ['button']
		}).show();
	</script>
	@endif
</body>
</html>
