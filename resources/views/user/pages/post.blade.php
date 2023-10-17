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
                    <div class="bp bp--img u-s-m-b-30">
                        <div class="bp__wrap">
                            <div style="display: grid;">
                                @if(Session::has('user'))
                                <a style="text-align: center;"><img src="{{Session::get('user')['avt']??''}}" style="width: 50px; height: 50px;border-radius: 50%;"/></a>
                                @endif
                                <form class="respond__form" action="{{route('post-create')}}" method="post">
                                    @csrf 
                                    @method('post')
                                    <div class="respond__group">
                                        <div class="u-s-m-b-3">
                                            <textarea class="text-area text-area--primary-style" required style="height:100px" id="post" name="post"></textarea>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn--e-brand-shadow" type="submit">Đăng bài mới</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @foreach($posts->sortByDesc('createDate') as $post)
                    <div class="bp bp--img u-s-m-b-30">
                        <div class="bp__wrap">
                            <span class="bp__stat-wrap">
                                <span class="bp__author">
                                    <img src="{{$users_arr[$post['userPost']]['avt']}}" width="25px" height="25px"/>
                                    <a style="font-size: 16px;">{{ $users_arr[$post['userPost']]['email'] }}</a>
                                </span>
                            </span>
                            <span class="bp__stat-wrap" style="float: right">
                                <span class="bp__publish-date">
                                    <a>
                                        <span style="font-size: 16px;">{{convert_date($post['createDate'])}}</span>
                                    </a>
                                </span>
                            </span>
                            <div class="bp__thumbnail"  style="border-bottom:1px solid gray; text-align: center;padding: 2em;">
                            {{$post['content']}}
                            </div>
                            <div class="bp__info-wrap">
                                <div class="bp__stat">
                                    <span class="bp__stat-wrap" style="float: right;">
                                        <span class="bp__comment">
                                            <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" onClick="comment({{json_encode($post['comment'])}},`{{$post['id']}}`)">
                                                <i class="far fa-comments u-s-m-r-4"></i>
                                                <span style="font-size: 16px;">{{count($post['comment'])}} Bình luận</span>
                                            </a>
                                        </span>
                                    </span>
                                    <span class="bp__stat-wrap">
                                        <span class="bp__category">
                                            <a onClick="like(`{{$post['id']}}`)" style="font-size: 16px;"><i class="fas fa-heart"  @if(array_search($id,$post['like']) !== false) style="color:red" @endif>{{count($post['like'])}}</i>
                                            @if(array_search($id,$post['like']) !== false) Đã @endif
                                            Like</a>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @if(count($posts) == 0)
                    <h2 style="color:red; height:200px">Hiện tại chưa có bài đăng</h2>
                    @endif
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12">
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->
</div>

<div class="modal fade" id="add-to-cart">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-radius modal-shadow">

            <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="s-option">
                            <span class="s-option__text">Danh sách comment</span>
                            <div class="s-option__link-box" id="commentPost">
                                <a class="s-option__link btn--e-white-brand-shadow">CONTINUE SHOPPING</a>
                            </div>
                        </div>
                    </div>
                    <form class="respond__form" action="{{route('comment')}}" method="get">
                        <input type="hidden" id="postId" name="postId"/>
                        <input type="hidden" id="local2" name="local"/>
                        <div class="respond__group">
                            <div class="u-s-m-b-5">
                                <textarea class="text-area text-area--primary-style" style="height:80px" id="comment" name="comment"></textarea>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn--e-brand-shadow" type="submit">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function comment(comment,postId)
    {
        let str = "";
        if(comment.length == 0) str+=`<a class="s-option__link btn--e-white-brand-shadow" style="text-align:left">Chưa có bình luận nào</a>`;
        for(let i = 0; i < comment.length; i++)
        {
            str+=`<a class="s-option__link btn--e-white-brand-shadow" style="text-align:left">`+comment[i].email+` : `+comment[i].content+`</a>`;
        }
        document.getElementById("commentPost").innerHTML = str;
        document.getElementById("postId").value = postId;
    }
    function like(postId)
    {
        location.href = '/like/'+postId+'/'+window.scrollY;
    }
    // Lắng nghe sự kiện scroll trên window
    window.addEventListener('scroll', function() {
        // Lấy vị trí cuộn theo chiều dọc
        let scrollPosition = window.scrollY;
        document.getElementById("local2").value = scrollPosition;
    });
</script>
@if(session('local'))
	<script>
		setTimeout(function() {
        window.scrollTo(0, {{session('local')}});
        },100)
	</script>
	@endif
@endsection