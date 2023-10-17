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
                                <a href="{{route('home')}}">Trang chủ</a>
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
                        @include('user.layouts.menu_account')
                        <div class="col-lg-9 col-md-12">
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                <div class="dash__pad-2">
                                    <div class="dash__address-header">
                                        <h1 class="dash__h1">Địa chỉ</h1>
                                        <div>
                                            <span class="dash__link dash__link--black u-s-m-r-8">
                                                <a>Thiết lập địa chỉ để giao hàng</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius u-s-m-b-30">
                                <div class="dash__table-2-wrap gl-scroll">
                                    <table class="dash__table-2">
                                        <thead>
                                            <tr>
                                                <th>Chọn</th>
                                                <th>Người nhận</th>
                                                <th>Địa chỉ</th>
                                                <th>Số ĐT</th>
                                                <th>Mô tả</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="radio-box">
                                                        <input type="radio" id="address-1" name="default-address" checked="">
                                                        <div class="radio-box__state radio-box__state--primary">
                                                            <label class="radio-box__label" for="address-1"></label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Nguyễn Từ Văn</td>
                                                <td>4247 Ashford Drive Virginia VA-20006 USA</td>
                                                <td>0967267943</td>
                                                <td>
                                                    <div class="gl-text">Default Shipping Address</div>
                                                    <div class="gl-text">Default Billing Address</div>
                                                </td>
                                                <td>
                                                    <a class="address-book-edit btn--e-transparent-platinum-b-2" href="dash-address-edit.html">Edit</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="radio-box">
                                                        <input type="radio" id="address-1" name="default-address">
                                                        <div class="radio-box__state radio-box__state--primary">
                                                            <label class="radio-box__label" for="address-1"></label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Nguyễn Từ Văn</td>
                                                <td>4247 Ashford Drive Virginia VA-20006 USA</td>
                                                <td>0967267943</td>
                                                <td>
                                                    <div class="gl-text">Default Shipping Address</div>
                                                    <div class="gl-text">Default Billing Address</div>
                                                </td>
                                                <td>
                                                    <a class="address-book-edit btn--e-transparent-platinum-b-2" href="dash-address-edit.html">Edit</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div>
                                <a class="dash__custom-link btn--e-brand-b-2" href="dash-address-add.html"><i class="fas fa-plus u-s-m-r-8"></i>
                                <span>Thêm địa chỉ</span>
                                </a>
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