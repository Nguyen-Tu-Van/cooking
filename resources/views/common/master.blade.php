<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<base href="{{asset('')}}">
    @yield('title')
	<!-- Global stylesheets -->
	<link rel="shortcut icon" type="image/x-icon" href="common/images/logo/danghai.png" />
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/all.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

    @yield('css')

	<!-- Core JS files -->
	<script src="global_assets/js/main/jquery.min.js"></script>
	<script src="global_assets/js/main/bootstrap.bundle.min.js"></script>
	<!-- /core JS files -->

	<!-- Button action -->
	<script src="global_assets/js/plugins/ui/fab.min.js"></script>
	<script src="global_assets/js/plugins/ui/prism.min.js"></script>
    @yield('js1')
	<script src="global_assets/js/plugins/loaders/blockui.min.js"></script>
	<script src="global_assets/js/plugins/ui/prism.min.js"></script>
	<!-- Theme JS files -->
	<script src="assets/js/app.js"></script>
	<!-- /theme JS files -->


	<!-- Button action -->
	<script src="global_assets/js/demo_pages/extra_fab.js"></script>
    @yield('js2')
	
	<style>
    .navbar-brand
    {
        padding: 3px;
    }
    .navbar-brand img
    {
        width: 180px;
        height: auto;
    }
    .text, .testimony-29101{
        background-color: orange !important;
    }
    footer,.container .course {
        background-color: #414852;
        color: white;
    }
    .advise .form-group{
        margin-bottom:0.4em;
    }
	.btGroup{
		right: 2em;
		top: 5em;
	}
	.testimony-29101 .text{
		padding : 1em;
	}
</style>
</head>

<body class="layout-boxed-bg">

	<!-- Page content -->
	<div class="layout-boxed">
		<div class="page-content">
			
			<!-- Content -->
			@yield('content')
			<!-- /Content -->

		</div>
	</div>
	<!-- /page content -->

    @yield('addjs')
	<!-- <script src="common/js/main.js"></script> -->
	<script>
    function show_pass($id)
    {
        document.getElementById($id).type = 'text';
        document.getElementById($id+'_eye').style.display = 'none';
        document.getElementById($id+'_eye_flash').style.display = 'block';
    }
    function hidden_pass($id)
    {
        document.getElementById($id).type = 'password';
        document.getElementById($id+'_eye').style.display = 'block';
        document.getElementById($id+'_eye_flash').style.display = 'none';
    }
</script>

</body>
</html>
