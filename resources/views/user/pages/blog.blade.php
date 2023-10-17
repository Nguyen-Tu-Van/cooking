@extends('user.master')

@section('css')
<style>
    .alert-dismissible{
        background-color: #FCE3E3;
    }
</style>
@endsection

@section('content')
<div class="app-content">

    <!--====== Section 1 ======-->
    <div class="u-s-p-y-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-12">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    @foreach($tours as $blog)
                    <div class="bp bp--img u-s-m-b-30">
                        <i class="fas fa-heart" style="color:red">{{count($favorites_arr[$blog['favoriteId']]['userIds'])}}</i>
                        <a href="{{route('favorite',$blog['favoriteId'])}}"class="btn btn-primary" style="padding:0.2em;float: right;" type="submit">Bỏ yêu thích</a>
                        <div class="bp__wrap">
                            <div class="bp__thumbnail">
                                <!--====== Image Code ======-->

                                <a class="aspect aspect--bg-grey aspect--1366-768 u-d-block" href="">

                                    <img class="aspect__img" src="{{$blog['imageUrl']}}" alt=""></a>
                                <!--====== End - Image Code ======-->
                            </div>
                            <div class="bp__info-wrap">
                                <div class="bp__stat">
                                    <span class="bp__stat-wrap">
                                        <span class="bp__publish-date">
                                            <a href="blog-left-sidebar.html">
                                                <span>25 September 2023</span>
                                            </a>
                                        </span>
                                    </span>
                                    <span class="bp__stat-wrap">
                                        <span class="bp__author">
                                            <a href="blog-left-sidebar.html">Admin</a>
                                        </span>
                                    </span>
                                    <span class="bp__stat-wrap">
                                        <span class="bp__comment">
                                            <a href="blog-detail.html"><i class="far fa-comments u-s-m-r-4"></i>
                                                <span>...</span>
                                            </a>
                                        </span>
                                    </span>
                                    <span class="bp__stat-wrap">
                                        <span class="bp__category">
                                            <a href="blog-left-sidebar.html">{{$blog['type']}}</a>
                                        </span>
                                    </span>
                                </div>
                                <span class="bp__h1">
                                    <a href="{{route('travelling',[$blog['title'],$blog['id']])}}">{{$blog['title']}}</a>
                                </span>
                                <p class="bp__p">{{$blog['description']}}</p>
                                <div class="gl-l-r">
                                    <div>
                                        <span class="bp__read-more">
                                            <a href="{{route('travelling',[$blog['title'],$blog['id']])}}">Xem chi tiết</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @if(count($tours) == 0)
                    <h2 style="color:red; height:200px">Hiện tại chưa có tour yêu thích</h2>
                    @endif
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12">
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->
</div>
@endsection