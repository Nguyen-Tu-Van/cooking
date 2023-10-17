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
                                <a>Đăng nhập</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->

    <!--====== Section 2 ======-->
    <div class="u-s-p-b-0">
        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row row--center">
                    <div class="col-lg-6 col-md-8 u-s-m-b-20">
                        <div class="l-f-o">
                            <div class="l-f-o__pad-box">
                                @if(isset($_GET['url_redirect']))
                                <form class="l-f-o__form" method="post" action="{{route('check-login','url_redirect='.$_GET['url_redirect'])}}">
                                @else
                                <form class="l-f-o__form" method="post" action="{{route('check-login')}}">
                                @endif
                                @csrf
                                @method('POST')
                                    @if(count($errors)>0)
                                        @foreach($errors->all() as $value)
                                        <div class="alert alert-danger border-0 alert-dismissible m-1" style="margin:2px;padding:4px;background-color:lightcoral;color:white; border-radius: 5px !important;">
                                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <span class="font-weight-semibold">{{$value}}</span>
                                        </div>
                                        @endforeach
                                    @endif
                                    @if(Session::has('error'))
                                    <div class="alert alert-danger border-0 alert-dismissible m-1" style="margin:2px;padding:4px;background-color:lightcoral;color:white; border-radius: 5px !important;">
                                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                        <span class="font-weight-semibold">{{Session('error')}}</span>
                                    </div>
                                    @endif
                                    @if(Session::has('success'))
                                    <div class="alert alert-danger border-0 alert-dismissible m-1" style="margin:2px;padding:4px;background-color:limegreen;color:white; border-radius: 5px !important;">
                                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                        <span class="font-weight-semibold">{{Session('success')}}</span>
                                    </div>
                                    @endif
                                    <div class="u-s-m-b-20">
                                        <label class="gl-label" for="login-email">E-MAIL *</label>
                                        <input class="input-text input-text--primary-style" name="email" type="text" id="login-email" value="{{Cookie::get('email_cookie_user')}}">
                                    </div>
                                    <div class="u-s-m-b-20">
                                        <label class="gl-label" for="login-password" style="float: left;">Mật khẩu * 
                                        </label>
                                        <span class="check-box" style="float: right;" onclick="showPassword()">
                                            <input type="checkbox" id="toggle_password">
                                            <div class="check-box__state check-box__state--primary">
                                                <label class="check-box__label" for="toggle_password">Hiển thị</label>
                                            </div>
                                        </span>
                                        <input class="input-text input-text--primary-style" type="password" name="password" id="login-password" value="{{Cookie::get('password_cookie_user')}}">
                                    </div>
                                    <div class="check-box u-s-m-b-20">
                                        <input type="checkbox" id="remember" name="remember" value="1" {{Cookie::get('remember_cookie_user')==1?'checked':''}}>
                                        <div class="check-box__state check-box__state--primary">
                                            <label class="check-box__label" for="remember">Đăng nhập cho lần sau</label>
                                        </div>
                                    </div>
                                    <div class="gl-inline">
                                        <div class="u-s-m-b-20">
                                            <button class="btn btn--e-transparent-brand-b-2" type="submit">Đăng nhập</button></div>
                                        <div class="u-s-m-b-20">
                                            <a class="gl-link" href="{{route('forget-password')}}">Quên mật khẩu?</a>
                                        </div>
                                    </div>
                                </form>
                                <h1 class="gl-h1">Bạn cần tài khoản để mua với số lượng lớn?</h1>
                                <span class="gl-text u-s-m-b-20">Liên hệ với chúng tôi để được cấp tài khoản, khi có tài khoản bạn sẽ nhận được nhiều ưu đãi cực hấp dẫn. Lưu ý: chỉ mở tài khoản với những khách hàng mua sỉ</span>
                                <div class="u-s-m-b-15">
                                    <a class="l-f-o__create-link btn--e-transparent-brand-b-2" href="{{route('contact')}}">Liên hệ với chúng tôi</a>
                                </div>
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

@section('addjs')
<script>
    let check = true;
    function showPassword()
    {
        if(check)
        {
            document.getElementById('login-password').type = 'text';
            check = false;
        }
        else
        {
            document.getElementById('login-password').type = 'password';
            check = true;
        }
    }
</script>
@endsection