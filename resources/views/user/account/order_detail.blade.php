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
                                <a>Chi tiết đơn hàng</a>
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
                                    <div class="manage-o">
                                        <div class="manage-o__header u-s-m-b-30">
                                            <div class="manage-o__icon"><i class="fas fa-box u-s-m-r-5"></i>

                                                <span class="manage-o__text">Mã đơn hàng #305423126</span></div>
                                        </div>
                                        <div class="dash-l-r">
                                            <div class="manage-o__text u-c-secondary">Đặt vào lúc 09:20:35 4/2/2023</div>
                                            <div class="manage-o__icon"><i class="fas fa-truck u-s-m-r-5"></i>

                                                <span class="manage-o__text">Standard</span></div>
                                        </div>
                                        <div class="manage-o__timeline">
                                            <div class="timeline-row">
                                                <div class="col-lg-4 u-s-m-b-30">
                                                    <div class="timeline-step">
                                                        <div class="timeline-l-i timeline-l-i--finish">

                                                            <span class="timeline-circle"></span></div>

                                                        <span class="timeline-text">Chờ xử lí</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 u-s-m-b-30">
                                                    <div class="timeline-step">
                                                        <div class="timeline-l-i timeline-l-i--finish">

                                                            <span class="timeline-circle"></span></div>

                                                        <span class="timeline-text">Đang giao</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 u-s-m-b-30">
                                                    <div class="timeline-step">
                                                        <div class="timeline-l-i">

                                                            <span class="timeline-circle"></span></div>

                                                        <span class="timeline-text">Đã giao</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius">
                                <h2 class="dash__h2 u-s-p-xy-20">RECENT ORDERS</h2>
                                <div class="dash__table-wrap gl-scroll">
                                    <table class="dash__table">
                                        <thead>
                                            <tr>
                                                <th>Order #</th>
                                                <th>Placed On</th>
                                                <th>Items</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>3054231326</td>
                                                <td>26/13/2016</td>
                                                <td>
                                                    <div class="dash__table-img-wrap">

                                                        <img class="u-img-fluid" src="images/product/electronic/product3.jpg" alt=""></div>
                                                </td>
                                                <td>
                                                    <div class="dash__table-total">

                                                        <span>$126.00</span>
                                                        <div class="dash__link dash__link--brand">

                                                            <a href="dash-manage-order.html">MANAGE</a></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3054231326</td>
                                                <td>26/13/2016</td>
                                                <td>
                                                    <div class="dash__table-img-wrap">

                                                        <img class="u-img-fluid" src="images/product/electronic/product14.jpg" alt=""></div>
                                                </td>
                                                <td>
                                                    <div class="dash__table-total">

                                                        <span>$126.00</span>
                                                        <div class="dash__link dash__link--brand">

                                                            <a href="dash-manage-order.html">MANAGE</a></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3054231326</td>
                                                <td>26/13/2016</td>
                                                <td>
                                                    <div class="dash__table-img-wrap">

                                                        <img class="u-img-fluid" src="images/product/men/product8.jpg" alt=""></div>
                                                </td>
                                                <td>
                                                    <div class="dash__table-total">

                                                        <span>$126.00</span>
                                                        <div class="dash__link dash__link--brand">

                                                            <a href="dash-manage-order.html">MANAGE</a></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3054231326</td>
                                                <td>26/13/2016</td>
                                                <td>
                                                    <div class="dash__table-img-wrap">

                                                        <img class="u-img-fluid" src="images/product/women/product10.jpg" alt=""></div>
                                                </td>
                                                <td>
                                                    <div class="dash__table-total">

                                                        <span>$126.00</span>
                                                        <div class="dash__link dash__link--brand">

                                                            <a href="dash-manage-order.html">MANAGE</a></div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius row u-s-m-t-30 u-s-p-t-10 u-s-p-b-10">
                                <div class="col-lg-6">
                                    <div class="dash__box dash__box--bg-white dash__box--shadow u-h-100">
                                        <div class="dash__pad-3">
                                            <h2 class="dash__h2 u-s-m-b-8">Địa chỉ nhận hàng</h2>
                                            <div class="dash-l-r u-s-m-b-8">
                                                <div class="manage-o__text-2 u-c-secondary">Người nhận</div>
                                                <div class="manage-o__text-2 u-c-secondary"  style="width:50%;font-weight: 400 !important;">Nguyễn Từ Văn</div>
                                            </div>
                                            <div class="dash-l-r u-s-m-b-8">
                                                <div class="manage-o__text-2 u-c-secondary">Số điện thoại</div>
                                                <div class="manage-o__text-2 u-c-secondary" style="width:50%;font-weight: 400 !important;">0967267943</div>
                                            </div>
                                            <div class="dash-l-r u-s-m-b-8">
                                                <div class="manage-o__text-2 u-c-secondary">Hình thức thanh toán</div>
                                                <div class="manage-o__text-2 u-c-secondary" style="width:50%;font-weight: 400 !important;">Thanh toán khi nhận hàng</div>
                                            </div>
                                            <div class="dash-l-r u-s-m-b-8">
                                                <div class="manage-o__text-2 u-c-secondary">Trạng thái thanh toán</div>
                                                <div class="manage-o__text-2 u-c-secondary" style="width:50%;font-weight: 400 !important;">Chưa thanh toán</div>
                                            </div>
                                            <div class="dash-l-r u-s-m-b-8">
                                                <div class="manage-o__text-2 u-c-secondary">Địa chỉ giao</div>
                                                <div class="manage-o__text-2 u-c-secondary" style="width:50%;font-weight: 400 !important;">Thôn hòa lâm, xã duy trung, huyện duy xuyên, tỉnh quảng nam</div>
                                            </div>
                                            <div class="dash-l-r u-s-m-b-8">
                                                <div class="manage-o__text-2 u-c-secondary">Mô tả</div>
                                                <div class="manage-o__text-2 u-c-secondary" style="width:50%;font-weight: 400 !important;">Giao nhanh</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="dash__box dash__box--bg-white dash__box--shadow u-h-100">
                                        <div class="dash__pad-3">
                                            <h2 class="dash__h2 u-s-m-b-8">Giá đơn hàng</h2>
                                            <div class="dash-l-r u-s-m-b-8">
                                                <div class="manage-o__text-2 u-c-secondary">Tổng phụ</div>
                                                <div class="manage-o__text-2 u-c-secondary" style="width:50%;font-weight: 400 !important;">1,300,000 đ</div>
                                            </div>
                                            <div class="dash-l-r u-s-m-b-8">
                                                <div class="manage-o__text-2 u-c-secondary">Phí vận chuyển</div>
                                                <div class="manage-o__text-2 u-c-secondary" style="width:50%;font-weight: 400 !important;">0 đ</div>
                                            </div>
                                            <div class="dash-l-r u-s-m-b-8">
                                                <div class="manage-o__text-2 u-c-secondary">Mã giảm giá</div>
                                                <div class="manage-o__text-2 u-c-secondary" style="width:50%;font-weight: 400 !important;">- 100,000 đ</div>
                                            </div>
                                            <div class="dash-l-r u-s-m-b-8">
                                                <div class="manage-o__text-2 u-c-secondary">Tổng tiền</div>
                                                <div class="manage-o__text-2 u-c-secondary" style="width:50%;font-weight: 400 !important;">1,200,000 đ</div>
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