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
                            <h1 class="section__heading u-c-secondary">Mật khẩu mới</h1>
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
                            <div class="l-f-o__pad-box">
                                @if(count($errors)>0)
                                    @foreach($errors->all() as $value)
                                    <div class="alert alert-danger border-0 alert-dismissible m-1" style="margin:2px;padding:4px;background-color:lightcoral;color:white; border-radius: 5px !important;">
                                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                        <span class="font-weight-semibold">{{$value}}</span>
                                    </div>
                                    @endforeach
                                @endif
                                <span class="gl-text u-s-m-b-20">Xin chào <strong>{{$user->name}}</strong>. Vui lòng nhập mặt khẩu mới.</span>
                                <form class="l-f-o__form" action="{{route('check-password')}}" method="post">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="remember_token" value="{{$user->remember_token}}"/>
                                    <div class="u-s-m-b-20">
                                        <label class="gl-label" for="reset-email">E-MAIL *</label>
                                        <input class="input-text input-text--primary-style" type="text" disabled value="{{$user->email}}">
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
                                        <input class="input-text input-text--primary-style" type="password" name="password" id="login-password">
                                    </div>
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