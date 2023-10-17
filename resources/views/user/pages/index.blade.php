@extends('user.master')

@section('content')
<div class="app-content">

    <!--====== Anti Flash White Background ======-->
    <div class="bg-anti-flash-white">

        <!--====== White Container ======-->
        <div class="white-container">
            <div class="container">

                <!--====== Primary Slider ======-->
                <div class="s-skeleton s-skeleton--h-600 s-skeleton--bg-black">
                    <div class="owl-carousel primary-style-2" id="hero-slider">
                        @foreach($slides as $slide)
                        <div class="hero-slide" style="background-image: url({{$slide}});">
                            <div class="primary-style-2-container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="slider-content slider-content--animation">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!--====== End - Primary Slider ======-->
            </div>

            <!--====== Section 2 ======-->


            <!--====== Electronics Tab ======-->
            <div class="u-s-p-b-20">

                <!--====== Section Intro ======-->
                <div class="section__intro u-s-m-b-20">
                    <div class="container">
                        <div class="row" style="margin-top:20px">
                            <div class="col-lg-12">
                                <div class="block">
                                    <ul class="nav tab-list">
                                        <li class="nav-item">
                                            <a class="nav-link btn--e-white-brand-shadow active show" data-toggle="tab" href="#keyzero">Tất cả</a>
                                        </li>
                                        @foreach($tours_type as $key => $type)
                                        <li class="nav-item">
                                            <a class="nav-link btn--e-white-brand-shadow" data-toggle="tab" href="#key{{$key}}">{{$type}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Intro ======-->


                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="keyzero">
                                <div class="slider-fouc">
                                    <div class="owl-carousel tab-slider" data-item="4">
                                    @foreach($tours as $item)
                                        <div class="u-s-m-b-30">
                                            <div class="product-o product-o--hover-on">
                                                <i class="fas fa-heart" style="position: absolute; top:0; color: red"> {{count($favorites_arr[$item['favoriteId']]['userIds'])}}</i>
                                                <div class="product-o__wrap">

                                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                                        <img class="aspect__img" src="{{$item['imageUrl']}}" alt=""></a>
                                                    <div class="product-o__action-wrap">
                                                        <ul class="product-o__action-list">
                                                            <li>
                                                                <a href="{{route('travelling',[$item['title'],$item['id']])}}" data-tooltip="tooltip" data-placement="top" title="Xem chi tiết"><i class="fas fa-plus-circle"></i></a></li>
                                                            <!-- <li>
                                                                <a href="{{route('travelling',[$item['title'],$item['id']])}}" data-tooltip="tooltip" data-placement="top" title="Yêu thích"><i class="fas fa-heart"></i></a>
                                                            </li> -->
                                                        </ul>
                                                    </div>
                                                </div>
                                                <span class="product-o__name">

                                                    <a href="{{route('travelling',[$item['title'],$item['id']])}}">{{$item['title']}}</a></span>

                                                <span class="product-o__price">{{number_format($item['price'], 0, ',', '.')}} đ</span>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                            @foreach($tours_type as $key => $type)
                                <!--====== Tab 1 ======-->
                                <div class="tab-pane" id="key{{$key}}">
                                    <div class="slider-fouc">
                                        <div class="owl-carousel tab-slider" data-item="4">
                                            @foreach($tours as $item)
                                                @if($type == $item['type'])
                                                <div class="u-s-m-b-30">
                                                    <div class="product-o product-o--hover-on">
                                                    <i class="fas fa-heart" style="position: absolute; top:0; color: red"> {{count($favorites_arr[$item['favoriteId']]['userIds'])}}</i>
                                                        <div class="product-o__wrap">

                                                            <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                                                <img class="aspect__img" src="{{$item['imageUrl']}}" alt=""></a>
                                                            <div class="product-o__action-wrap">
                                                                <ul class="product-o__action-list">
                                                                    <li>
                                                                        <a href="{{route('travelling',[$item['title'],$item['id']])}}" data-tooltip="tooltip" data-placement="top" title="Xem chi tiết"><i class="fas fa-plus-circle"></i></a></li>
                                                                    <!-- <li>
                                                                        <a href="{{route('travelling',[$item['title'],$item['id']])}}" data-tooltip="tooltip" data-placement="top" title="Yêu thích"><i class="fas fa-heart"></i></a>
                                                                    </li> -->
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <span class="product-o__name">

                                                            <a href="{{route('travelling',[$item['title'],$item['id']])}}">{{$item['title']}}</a></span>

                                                        <span class="product-o__price">{{number_format($item['price'], 0, ',', '.')}} đ</span>
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!--====== End - Tab 1 ======-->
                            @endforeach
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Electronics Tab ======-->
            <!--====== End - Section 2 ======-->


            <!--====== Section 3 ======-->

            <!--====== Section 10 ======-->
            <div class="u-s-p-b-60">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                <div class="service u-h-100">
                                    <div class="service__icon"><i class="fas fa-truck"></i></div>
                                    <div class="service__info-wrap">

                                        <span class="service__info-text-1">Đưa đón tận nơi</span>

                                        <span class="service__info-text-2">Miễn phí đưa đón với đơn hàng trên 1 triệu</span></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                <div class="service u-h-100">
                                    <div class="service__icon"><i class="fas fa-redo"></i></div>
                                    <div class="service__info-wrap">

                                        <span class="service__info-text-1">Đi mọi nơi bạn muốn</span>

                                        <span class="service__info-text-2">Đặt tour với một cái nhấp chuột</span></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                <div class="service u-h-100">
                                    <div class="service__icon"><i class="fas fa-headphones-alt"></i></div>
                                    <div class="service__info-wrap">

                                        <span class="service__info-text-1">Hỗ trợ 24/7</span>

                                        <span class="service__info-text-2">Hỗ trợ tư vấn 24/24 để có trải nghiệm đặt tour suôn sẻ</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 10 ======-->
        </div>
        <!--====== End - White Container ======-->

    </div>
    <!--====== End - Anti Flash White Background ======-->

</div>
@endsection