@extends('user.master')

@section('content')
<div class="app-content">

    <!--====== Section 1 ======-->
    <div class="u-s-p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">

                    <!--====== Product Breadcrumb ======-->
                    <div class="pd-breadcrumb u-s-m-b-30">
                        <ul class="pd-breadcrumb__list">
                            <li class="has-separator">

                                <a href="{{route('house')}}">Home</a></li>
                            <li class="has-separator">

                                <a>{{$tour['type']}}</a></li>
                            <li class="is-marked">

                                <a>{{$tour['title']}}</a></li>
                        </ul>
                    </div>
                    <!--====== End - Product Breadcrumb ======-->


                    <!--====== Product Detail Zoom ======-->
                    <div class="pd u-s-m-b-30">
                        <div class="slider-fouc pd-wrap">
                            <div id="pd-o-initiate">
                                <div class="pd-o-img-wrap" data-src="{{$tour['imageUrl']}}">

                                    <img class="u-img-fluid" src="{{$tour['imageUrl']}}" data-zoom-image="{{$tour['imageUrl']}}" alt=""></div>
                            </div>

                            <!-- <span class="pd-text">Click for larger zoom</span> -->
                        </div>
                        <div class="u-s-m-t-15" style="display:none">
                            <div class="slider-fouc">
                                <div id="pd-o-thumbnail">
                                    <div>

                                        <img class="u-img-fluid" src="{{$tour['imageUrl']}}" alt=""></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="u-s-m-b-15">
                            <div class="pd-detail__inline">
                                <span class="pd-detail__click-wrap" style="color:red"><i class="far fa-heart u-s-m-r-6"></i>
                                    @if(Session::has('user') && $check_favorite!==false)
                                    <a href="{{route('favorites')}}" style="color:red">Đã thêm vào danh sách yêu thích</a>
                                    @else
                                    <a href="{{route('favorite',$tour['favoriteId'])}}">Thêm vào danh sách yêu thích</a>
                                    @endif
                                </span>
                            </div>
                        </div>
                    <!--====== End - Product Detail Zoom ======-->
                </div>
                <div class="col-lg-6">

                    <!--====== Product Right Side Details ======-->
                    <div class="pd-detail">
                        <div class="u-s-p-y-20">

                            <span class="pd-detail__name">{{$tour['title']}}</span></div>
                        <div>
                            <div class="pd-detail__inline">

                                <span class="pd-detail__price">{{number_format($tour['price'], 0, ',', '.')}} vnđ / 1 người</span>

                        </div>
                        <div class="u-s-m-b-15">
                            <div class="pd-detail__inline">

                                <span class="pd-detail__stock">Tour hot</span>

                                <span class="pd-detail__left">Khuyến mãi</span></div>
                        </div>
                        <div class="u-s-m-b-15">

                            <span class="pd-detail__preview-desc">{{$tour['description']}}</span></div>
                                <div class="u-s-m-b-15">
                                            <div class="pd-detail__inline">

                                                <span class="pd-detail__stock u-s-m-b-5">Nơi khởi hành : {{$tour['place']??'__'}}</span>
                                                <br>
                                                <span class="pd-detail__left">{{$tour['time']??'Chưa có lịch : __'}}</span><br>
                                            </div>
                                        </div>
                                <div class="pd-detail-inline-2">
                                    <!-- <div class="u-s-m-b-15">

                                        <div class="input-counter">

                                            <span class="input-counter__minus fas fa-minus"></span>

                                            <input class="input-counter__text input-counter--text-primary-style" type="text" value="1" data-min="1" data-max="1000">

                                            <span class="input-counter__plus fas fa-plus"></span></div>
                                    </div> -->
                                    <div class="u-s-m-b-15">
                                        @if(isset($tour['schedule']))
                                        <button class="btn btn--e-brand-b-2" style="padding:1em" data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top">Tiến hành đặt tour</button>
                                        @else
                                        <button class="btn btn--e-brand-b-2" style="padding:1em">Hiện tại tour chưa có lịch trình</button>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--====== End - Product Right Side Details ======-->
                </div>
            </div>
        </div>
    </div>

    <!--====== Product Detail Tab ======-->
    <div class="u-s-p-y-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pd-tab">
                        <div class="u-s-m-b-30">
                            <ul class="nav pd-tab__list">
                                <li class="nav-item">

                                    <a class="nav-link" data-toggle="tab" href="#pd-desc">DESCRIPTION</a></li>
                                <li class="nav-item">

                                    <a class="nav-link active" id="view-review" data-toggle="tab" href="#pd-rev">REVIEWS

                                        <span>( @if(isset($comment_arr[$id])) {{count($comment_arr[$id]['comment'])}} @endif )</span></a></li>
                            </ul>
                        </div>
                        <div class="tab-content">

                            <!--====== Tab 1 ======-->
                            <div class="tab-pane" id="pd-desc">
                                <div class="pd-tab__desc">
                                    <div class="u-s-m-b-15">
                                        <p>{{$tour['description']}}</p>
                                    </div>
                                </div>
                            </div>
                            <!--====== End - Tab 1 ======-->


                            <!--====== Tab 3 ======-->
                            <div class="tab-pane fade show active" id="pd-rev">
                                <div class="pd-tab__rev">
                                    <div class="u-s-m-b-30">
                                        <form class="pd-tab__rev-f1" action="" method="POST">
                                            @csrf
                                            @method('POST')
                                            <div class="rev-f1__group">
                                                <div class="u-s-m-b-15">
                                                    <h2>Bình luận tại tour [{{$tour['title']}}]</h2>
                                                </div>
                                            </div>
                                            <div class="u-s-m-b-5">
                                                <label class="gl-label" for="reviewer-text">YOUR REVIEW *</label>
                                                <textarea class="text-area text-area--primary-style" style="width:100%" name="content" id="contentComment"></textarea>
                                            </div>
                                            <div>
                                            @if(Session::has('user'))
                                            <button class="btn btn-primary" onclick="addComment()" style="padding:0.5em" type="button">Bình luận</button>
                                            @else
                                            <b style="color:red">Vui lòng đăng nhập để bình luận</b>
                                            @endif
                                        </form>
                                        @if(isset($comment_arr[$id]))
                                            @foreach(array_reverse($comment_arr[$id]['comment']) as $key => $item)
                                            <div class="rev-f1__review">
                                                <div class="review-o u-s-m-b-15">
                                                    <div class="review-o__info u-s-m-b-8">

                                                        <span class="review-o__name">{{$users_arr[$item['userCommentId']]['email']}}</span>

                                                        <span class="review-o__date">27 Sep 2023</span>
                                                    </div>
                                                    <p class="review-o__text">{{$item['content']}}</p>
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!--====== End - Tab 3 ======-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Product Detail Tab ======-->
    <div class="u-s-p-b-90">

        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-46">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary u-s-m-b-12">Tour du lịch liên quan</h1>
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

<div class="modal fade" id="add-to-cart">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-radius modal-shadow">

            <!-- <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button> -->
            <div class="modal-body">
                <div class="row">
                    <form action="{{route('order')}}" method="post" style="padding-left:1em; width: 95%;">
                        @csrf   
                        @method('post')
                        <input type="hidden" name="product" value="{{$id}}"/>
                        <input type="hidden" name="place" value="{{$tour['place']??''}}"/>
                        <input type="hidden" name="time" value="{{$tour['time']??''}}"/>
                        <label class="gl-label" for="reviewer-text">Số điện thoại *</label>
                        <input class="input-text input-text--border-radius input-text--style-2 u-s-m-b-10" name='sdt' style="width:100%" type="text" required>
                        <label class="gl-label" for="reviewer-text">Tên người đặt *</label>
                        <input class="input-text input-text--border-radius input-text--style-2 u-s-m-b-10" name='ten' style="width:100%" type="text" required>
                        <label class="gl-label" for="reviewer-text">Số người * <b id="price"></b></label>
                        <input class="input-text input-text--border-radius input-text--style-2 u-s-m-b-10" name='numberPeople' style="width:100%" type="number" min="1" max="50" required oninput="changeMoney(this.value)">
                        <label class="gl-label" for="reviewer-text">Ngày khởi hành *</label>
                        <select class="select-box select-box--primary-style" name="startDate" required>
                            @foreach(explode(',',$tour['schedule']??'') as $schedule)
                            <option value="{{$schedule}}">{{$schedule}}</option>
                            @endforeach
                        </select>
                        <label class="gl-label" for="reviewer-text">Phòng</label>
                            <!--====== Radio Box ======-->
                            <div class="radio-box">
                                <input type="radio" name="room" value="1" checked="checked">
                                <div class="radio-box__state radio-box__state--primary">
                                    <label class="radio-box__label" for="pay-with-card">Single</label>
                                </div>
                            </div>
                            <!--====== End - Radio Box ======-->
                            <!--====== Radio Box ======-->
                            <div class="radio-box">

                                <input type="radio" name="room" value="2">
                                <div class="radio-box__state radio-box__state--primary">

                                    <label class="radio-box__label" for="pay-pal">Teams</label></div>
                            </div>
                            <!--====== End - Radio Box ======-->
                            <br/>

                        <button class="dash__custom-link btn--e-transparent-brand-b-2" type="submit" style="margin-top:10px">Đặt tour</button>
                        <button class="dash__custom-link btn--e-transparent-brand-b-2" type="button" data-dismiss="modal" style="width: 6rem;">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function addComment()
    {
        let cm = document.getElementById("contentComment").value;
        if(cm != "")
        {
            $.post("{{route('addComment')}}",
            {
                _token:"{{csrf_token()}}",
                id:"{{$id}}",
                content:cm
            },
            function(data,status){
                if(data == 0) location.href = "/login";
            });
            document.getElementById("contentComment").value = '';
            alert("Bình luận của bạn đã được ghi nhận");
        }
        else 
        {
            alert("Vui lòng nhập bình luận");
        }
    }
    function changeMoney(x)
    {
        let xy = `{{$tour['price']}}`*x;
        document.getElementById("price").innerHTML = xy.toLocaleString('de-DE') + " VNĐ";
    }
</script>
@endsection