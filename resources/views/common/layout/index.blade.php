@extends('Common.master')

@section('title')
<title>Đăng Hải Toeic - B1</title>
@endsection

@section('css')
<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="assets/css/carousel.css">
@endsection

@section('js1')
<script src="global_assets/js/plugins/ui/prism.min.js"></script>
<script src="global_assets/js/plugins/media/glightbox.min.js"></script>

<!-- Notify -->
<script src="global_assets/js/plugins/notifications/sweet_alert.min.js"></script>

<!-- Modal -->
<script src="global_assets/js/plugins/notifications/bootbox.min.js"></script>

@endsection

@section('js2')
<script src="global_assets/js/demo_pages/gallery.js"></script>

<!-- Modal -->
<script src="global_assets/js/demo_pages/components_modals.js"></script>

<!-- Notify -->
<script src="global_assets/js/demo_pages/extra_sweetalert.js?v=1"></script>

@endsection

@section('content')
<div class="content-wrapper">  
    <!-- Inner content -->
	<div class="content-inner">
        @include('Common/component/slide')
        <div class="container mt-5">
            @include('Common/component/course')

            @include('Common/component/introduce')

            @include('Common/component/advise')

            @include('Common/component/feedback')

            @include('Common/component/blog')

            @include('Common/component/faq')

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.936575022518!2d108.15235815059!3d16.068780743663282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219280a2cb7b9%3A0x815bd4f7dd7f3a4!2zMSBIw6AgVsSDbiBUw61uaCwgSG_DoCBLaMOhbmggTmFtLCBMacOqbiBDaGnhu4N1LCDEkMOgIE7hurVuZyA1NTAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1654689646138!5m2!1svi!2s" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
        <!-- /content area -->

        @include('Common/component/contact')

    </div>
    <!-- /inner content -->
    
</div>

    

<!-- <script src="assets/js/jquery-3.3.1.min.js"></script> -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/main.js?v=12"></script>

@endsection