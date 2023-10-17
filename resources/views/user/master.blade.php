<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="{{asset('')}}">
    <link href="asset/images/favicon.png" rel="shortcut icon">
    <title>Travlling</title>
    @yield("css")
    <!--====== Google Font ======-->
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet"> -->

    <!--====== font-awesome ======-->
    <link rel="stylesheet" href="asset/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
    
    <!--====== Vendor Css ======-->
    <link rel="stylesheet" href="asset/css/vendor.css">

    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href="asset/css/utility.css">

    <!--====== App ======-->
    <link rel="stylesheet" href="asset/css/app.css?v=41">
</head>
<body class="config" id="js-scrollspy-trigger">
    <!-- <div class="preloader is-active">
        <div class="preloader__wrap">
            <img class="preloader__img" src="asset/images/preloader.png" alt="">
        </div>
    </div> -->

    <!--====== Main App ======-->
    <div id="app">

        <!--====== Main Header ======-->
        @include('user.layouts.header')
        <!--====== End - Main Header ======-->


        <!--====== App Content ======-->
        @yield('content')
        <!--====== End - App Content ======-->


        <!--====== Main Footer ======-->
        @include('user.layouts.footer')
        <!--====== End - Main Footer ======-->

        <!--====== Modal Section ======-->
        @include('user.box.modal')
        <!--====== End - Modal Section ======-->
    </div>
    <!--====== End - Main App ======-->


    <!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->
    <!-- <script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('send', 'pageview')
    </script>
    <script src="asset/https://www.google-analytics.com/analytics.js" async defer></script> -->

    <!--====== Vendor Js ======-->
    <script src="asset/js/vendor.js"></script>

    <!--====== jQuery Shopnav plugin ======-->
    <script src="asset/js/jquery.shopnav.js"></script>

    <!--====== App ======-->
    <script src="asset/js/app.js"></script>
    <script>
        window.onscroll = function() {myFunction()};
        let header = document.getElementById("sticky");
        //var sticky = header.offsetTop;
        function myFunction() 
        {
            if (window.pageYOffset > 150) header.classList.add("sticky");
            else header.classList.remove("sticky");
        }
    </script>
    
    @yield('addjs')

    <!--====== Noscript ======-->
    <noscript>
        <div class="app-setting">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="app-setting__wrap">
                            <h1 class="app-setting__h1">JavaScript is disabled in your browser.</h1>

                            <span class="app-setting__text">Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </noscript>
</body>
</html>