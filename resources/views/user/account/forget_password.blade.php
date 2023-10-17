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
                                <a>Quên mật khẩu</a>
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

        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary">Quên mật khẩu?</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->


        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row row--center">
                    <div class="col-lg-6 col-md-8 u-s-m-b-20">
                        <div class="l-f-o">
                            @if(count($errors)>0)
                                @foreach($errors->all() as $value)
                                <div class="alert alert-danger border-0 alert-dismissible m-1" style="margin:2px;padding:4px;background-color:lightcoral;color:white; border-radius: 5px !important;">
                                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                    <span class="font-weight-semibold">{{$value}}</span>
                                </div>
                                @endforeach
                            @endif
                            <div class="l-f-o__pad-box">
                                <span class="gl-text u-s-m-b-20">Nhập email của bạn bên dưới và chúng tôi sẽ gửi cho bạn một liên kết để đặt lại mật khẩu của bạn.</span>
                                <form class="l-f-o__form" action="{{route('confirm-email')}}" method="post">
                                    @csrf
                                    @method('POST')
                                    <div class="u-s-m-b-20">
                                        <label class="gl-label" for="reset-email">E-MAIL *</label>
                                        <input class="input-text input-text--primary-style" type="text" id="reset-email" name="email" placeholder="Enter E-mail"></div>
                                    <div class="u-s-m-b-20">
                                        <button class="btn btn--e-transparent-brand-b-2" type="submit">Xác nhận</button></div>
                                    <div class="u-s-m-b-20">

                                        <a class="gl-link" href="{{route('login')}}">Trở lại đăng nhập</a></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->
</div>
@endsection