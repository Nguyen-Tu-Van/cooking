@extends('user.master')

@section('content')
<div class="app-content">

    <!--====== Section 1 ======-->
    <div class="u-s-p-y-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 u-s-m-b-30">
                        <div class="empty">
                            <div class="empty__wrap">
                                <span class="empty__big-text">404</span>
                                <span class="empty__text-1">Không tìm thấy trang bạn yêu cầu</span>
                                <a class="empty__redirect-link btn--e-brand" href="{{route('home')}}">Về trang chủ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 1 ======-->
</div>
@endsection