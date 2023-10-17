@extends('user.master')

@section('content')
<div class="app-content">

    <div class="u-s-p-b-90">

        <!--====== Section Intro ======-->
        <div class="section__intro" style="margin-top:20px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h2 class="section__heading u-c-secondary u-s-m-b-12">{{count($tours)}} kết quả cho tìm kiếm với từ khóa "{{$_GET['keyword']??''}}"</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->


        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="slider-fouc">
                    <div class="owl-carousel product-slider" data-item="4">
                    @foreach($tours as $item)
                        <div class="u-s-m-b-30">
                            <div class="product-o product-o--hover-on">
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
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 1 ======-->

</div>
@endsection