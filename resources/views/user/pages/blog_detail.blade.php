@extends('user.master')

@section('content')
<div class="app-content">

    <!--====== Section 1 ======-->
    <div class="u-s-p-y-20">

        <!--====== Detail Post ======-->
        <div class="detail-post">
            <div class="bp-detail">
                <div class="bp-detail__thumbnail">

                    <!--====== Image Code ======-->
                    <div class="aspect aspect--bg-grey aspect--1366-768">

                        <img class="aspect__img" src="{{asset($blog->image)}}" alt=""></div>
                    <!--====== End - Image Code ======-->
                </div>
                <div class="bp-detail__info-wrap">
                    <div class="bp-detail__stat">
                        <span class="bp-detail__stat-wrap">
                            <span class="bp-detail__publish-date">
                                <a href="blog-right-sidebar.html">
                                    <span>25 March 2018</span>
                                </a>
                            </span>
                        </span>
                        <span class="bp-detail__stat-wrap">
                            <span class="bp-detail__author">
                                <a href="blog-right-sidebar.html">Admin</a>
                            </span>
                        </span>
                        <span class="bp-detail__stat-wrap">
                            <span class="bp-detail__category">
                                <a href="blog-right-sidebar.html">{{$blog->category_blog->name}}</a>
                            </span>
                        </span>
                    </div>
                    <span class="bp-detail__h1">
                        <a>{{$blog->title}}</a>
                    </span>
                    <div class="blog-t-w">
                        @php $tags_blog = explode(",",$blog->tag); @endphp
                        @foreach($tags_blog as $tag)
                        <a class="gl-tag btn--e-transparent-hover-brand-b-2">{{trim($tag)}}</a>
                        @endforeach
                    </div>
                    <div class="bp-detail__p">
                        {!! $blog->content !!}
                    </div>
                    <blockquote class="bp-detail__q"><i class="fas fa-quote-left"></i></blockquote>
                    <div class="post-center-wrap">
                        <ul class="bp-detail__social-list">
                            <li>
                                <a class="s-fb--color" href="#"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a class="s-tw--color" href="#"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a class="s-insta--color" href="#"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                                <a class="s-wa--color" href="#"><i class="fab fa-whatsapp"></i></a>
                            </li>
                            <li>
                                <a class="s-gplus--color" href="#"><i class="fab fa-google-plus-g"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- <div class="gl-l-r bp-detail__postnp">
                        <div>
                            <a href="blog-detail.html">Previous Post</a>
                        </div>
                        <div>
                            <a href="blog-detail.html">Next Post</a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Detail Post ======-->
    <div class="u-s-p-b-60">
        <div class="d-meta">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-meta__comment-arena">
                            <span class="d-meta__text-2 u-s-m-b-6">Phản hồi về bài viết</span>
                            <span class="d-meta__text-3 u-s-m-b-16">Vui lòng điền đầy đủ thông tin ở mục có đánh dấu [*] để phản hồi</span>
                            <form class="respond__form">
                                <div class="respond__group">
                                    <div>
                                        <p class="u-s-m-b-30">
                                            <label class="gl-label" for="responder-name">Tên *</label>
                                            <input class="input-text input-text--primary-style" type="text" id="responder-name" name="name">
                                        </p>
                                        <p class="u-s-m-b-30">
                                            <label class="gl-label" for="responder-email">EMAIL *</label>
                                            <input class="input-text input-text--primary-style" type="text" id="responder-email" name="email">
                                        </p>
                                        <p class="u-s-m-b-30">
                                            <label class="gl-label" for="responder-email">Số điện thoại</label>
                                            <input class="input-text input-text--primary-style" type="text" id="responder-sdt" name="phone">
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
    </div>
    <!--====== End - Section 1 ======-->
</div>
@endsection