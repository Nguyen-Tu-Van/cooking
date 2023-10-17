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
                                    <h1 class="dash__h1 u-s-m-b-14">Thông tin tour</h1>
                                    <form action="{{route('orderTourPost')}}" method="post" style="padding-left:1em; width: 95%;">
                                        @csrf   
                                        @method('post')
                                        <label class="gl-label" for="reviewer-text">Số điện thoại *</label>
                                        <input class="input-text input-text--border-radius input-text--style-2 u-s-m-b-10" name='sdt' style="width:100%" type="text" required>
                                        <label class="gl-label" for="reviewer-text">Tên người đặt *</label>
                                        <input class="input-text input-text--border-radius input-text--style-2 u-s-m-b-10" name='ten' style="width:100%" type="text" required>
                                        <label class="gl-label" for="reviewer-text">Địa điểm tour *</label>
                                        <input class="input-text input-text--border-radius input-text--style-2 u-s-m-b-10" name='address' style="width:100%" type="text" required>
                                        <label class="gl-label" for="reviewer-text">Số người *</label>
                                        <input class="input-text input-text--border-radius input-text--style-2 u-s-m-b-10" name='numberPeople' style="width:100%" type="number" min="1" max="50" required>
                                        <label class="gl-label" for="reviewer-text">Giá tour *</label>
                                        <input class="input-text input-text--border-radius input-text--style-2 u-s-m-b-10" name='price' style="width:100%" type="price" required>
                                        <label class="gl-label" for="reviewer-text">Hướng dẫn viên *</label>
                                        <select class="select-box select-box--primary-style" name="employeId">
                                            @foreach($users as $user)
                                            <option value="{{$user['id']}}">{{$user['email']}} - {{$user['name']}}</option>
                                            @endforeach
                                        </select>
                                        <label class="gl-label" for="reviewer-text">Ngày đi *</label>
                                        <input class="input-text input-text--border-radius input-text--style-2 u-s-m-b-10" name='startDate' style="width:100%" type="datetime-local" required>
                                        <label class="gl-label" for="reviewer-text">Ngày về *</label>
                                        <input class="input-text input-text--border-radius input-text--style-2 u-s-m-b-10" name='endDate' style="width:100%" type="datetime-local" required>
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
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->
    </div>
@endsection