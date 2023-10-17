@extends('user.master')

@section('content')
<div class="app-content">

    <!--====== Section 1 ======-->
    <div class="u-s-p-b-10">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="breadcrumb">
                    <div class="breadcrumb__wrap">
                        <ul class="breadcrumb__list">
                            <li class="has-separator">
                                <a href="{{route('house')}}">Trang chủ</a>
                            </li>
                            <li class="is-marked">
                                <a>Thông tin cá nhân</a>
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
            <div class="dash">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                <div class="dash__pad-2">
                                    <h1 class="dash__h1 u-s-m-b-14">Thông tin cá nhân</h1>

                                    <div class="row">
                                        <div class="col-lg-4 u-s-m-b-30">
                                            <span class="dash__text">
                                                <img src="{{Session::get('user')['avt']}}" width="200"/>
                                            </span>
                                        </div>
                                        <div class="col-lg-8 u-s-m-b-30 row">
                                            <div class="col-lg-6 u-s-m-b-30">
                                                <h2 class="dash__h2 u-s-m-b-8">ID USER</h2>
                                                <span class="dash__text">{{Session::get('user')['userId']}}</span>
                                                <div class="dash__link dash__link--secondary">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 u-s-m-b-30">
                                                <h2 class="dash__h2 u-s-m-b-8">E-mail</h2>
                                                <span class="dash__text">{{Session::get('user')['email']}}</span>
                                                <div class="dash__link dash__link--secondary">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 u-s-m-b-30">
                                                <h2 class="dash__h2 u-s-m-b-8">Quyền hạn</h2>
                                                <span class="dash__text">{{Session::get('user')['admin'] ? 'Admin' : 'Khách du lịch'}}</span>
                                                <div class="dash__link dash__link--secondary">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 u-s-m-b-30">
                                                <h2 class="dash__h2 u-s-m-b-8">Quyền hạn</h2>
                                                <span class="dash__text">Vip {{Session::get('user')['level']?? '0'}}</span>
                                                <div class="dash__link dash__link--secondary">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="dash__link dash__link--secondary u-s-m-b-30">
                                                <form action="{{route('profilePost')}}" method="post" >
                                                    @csrf   
                                                    @method('post')
                                                    <input class="input-text input-text--border-radius input-text--style-2 u-s-m-b-10" name='avatar' style="width:100%" value="{{Session::get('user')['avt']}}">
                                                    <button class="dash__custom-link btn--e-transparent-brand-b-2" type="submit">Cập nhật avatar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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