@extends('user.master')

@section('content')
<div class="app-content">

    <!--====== Section 1 ======-->
    <div class="u-s-p-y-0">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="breadcrumb">
                    <div class="breadcrumb__wrap">
                        <ul class="breadcrumb__list">
                            <li class="has-separator">
                                <a href="{{route('home')}}">Trang chủ</a>
                            </li>
                            <li class="is-marked">
                                <a>Liên hệ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->

    <!--====== Section 2 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="g-map">
                            <div id="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1202.3622303613429!2d108.25533068011435!3d15.978115156944064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108e9c51b093%3A0xbb8417b6aec64b30!2zWDdINCs3MzksIEhvw6AgSOG6o2ksIE5nxakgSMOgbmggU8ahbiwgxJDDoCBO4bq1bmcgNTUwMDAwLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1680399925186!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->

    <!--====== Section 3 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 u-s-m-b-30">
                        <div class="contact-o u-h-100">
                            <div class="contact-o__wrap">
                                <div class="contact-o__icon"><i class="fas fa-phone-volume"></i></div>

                                <span class="contact-o__info-text-1">LET'S HAVE A CALL</span>

                                <span class="contact-o__info-text-2">(+0) 900 901 904</span>

                                <span class="contact-o__info-text-2">(+0) 900 901 902</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 u-s-m-b-30">
                        <div class="contact-o u-h-100">
                            <div class="contact-o__wrap">
                                <div class="contact-o__icon"><i class="fas fa-map-marker-alt"></i></div>

                                <span class="contact-o__info-text-1">OUR LOCATION</span>

                                <span class="contact-o__info-text-2">4247 Ashford Drive VA-20006</span>

                                <span class="contact-o__info-text-2">Virginia US</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 u-s-m-b-30">
                        <div class="contact-o u-h-100">
                            <div class="contact-o__wrap">
                                <div class="contact-o__icon"><i class="far fa-clock"></i></div>

                                <span class="contact-o__info-text-1">WORK TIME</span>

                                <span class="contact-o__info-text-2">5 Days a Week</span>

                                <span class="contact-o__info-text-2">From 9 AM to 7 PM</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 3 ======-->

    <!--====== Section 4 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact-area u-h-100">
                            <div class="contact-area__heading">
                                <h2>Liên hệ với chúng tôi</h2>
                            </div>
                            <form class="respond__form">
                                <div class="respond__group">
                                    <div>
                                        <p class="u-s-m-b-30">
                                            <label class="gl-label" for="responder-name">Tên *</label>
                                            <input class="input-text input-text--primary-style" type="text" id="responder-name" name="name">
                                        </p>
                                        <p class="u-s-m-b-30">
                                            <label class="gl-label" for="responder-email">Số điện thoại *</label>
                                            <input class="input-text input-text--primary-style" type="text" id="responder-sdt" name="phone">
                                        </p>
                                        <p class="u-s-m-b-30">
                                            <label class="gl-label" for="responder-email">EMAIL </label>
                                            <input class="input-text input-text--primary-style" type="text" id="responder-email" name="email">
                                        </p>
                                    </div>
                                    <div class="u-s-m-b-15">
                                        <label class="gl-label" for="comment">Nội dung liên hệ *</label><textarea class="text-area text-area--primary-style" id="comment"></textarea>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn--e-brand-shadow" type="submit">Gửi phản hồi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 4 ======-->

</div>
@endsection