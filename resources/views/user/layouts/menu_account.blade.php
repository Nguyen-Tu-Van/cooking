<div class="col-lg-3 col-md-12">
    <!--====== Dashboard Features ======-->
    <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
        <div class="dash__pad-1">

            <span class="dash__text u-s-m-b-16">Xin chào {{Auth::user()->name}}</span>
            <ul class="dash__f-list">
                <li>
                    <a class="{{Session::get('user_active')=='profile'?'dash-active':''}}" href="{{route('profile')}}">Thông tin cá nhân</a>
                </li>
                <li>
                    <a class="{{Session::get('user_active')=='order'?'dash-active':''}}" href="{{route('user-order')}}">Đơn hàng của tôi</a>
                </li>
                <li>
                    <a class="{{Session::get('user_active')=='address'?'dash-active':''}}" href="{{route('address')}}">Địa chỉ giao hàng</a>
                </li>
                <li>
                    <a class="{{Session::get('user_active')=='coupon'?'dash-active':''}}" href="{{route('coupon')}}">Mã khuyễn mãi</a>
                </li>
                <li>
                    <a class="{{Session::get('user_active')=='change_password'?'dash-active':''}}" href="{{route('change-password')}}">Đổi mật khẩu</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- <div class="dash__box dash__box--bg-white dash__box--shadow dash__box--w">
        <div class="dash__pad-1">
            <ul class="dash__w-list">
                <li>
                    <div class="dash__w-wrap">

                        <span class="dash__w-icon dash__w-icon-style-1"><i class="fas fa-cart-arrow-down"></i></span>

                        <span class="dash__w-text">4</span>

                        <span class="dash__w-name">Orders Placed</span></div>
                </li>
                <li>
                    <div class="dash__w-wrap">

                        <span class="dash__w-icon dash__w-icon-style-2"><i class="fas fa-times"></i></span>

                        <span class="dash__w-text">0</span>

                        <span class="dash__w-name">Cancel Orders</span></div>
                </li>
                <li>
                    <div class="dash__w-wrap">

                        <span class="dash__w-icon dash__w-icon-style-3"><i class="far fa-heart"></i></span>

                        <span class="dash__w-text">0</span>

                        <span class="dash__w-name">Wishlist</span></div>
                </li>
            </ul>
        </div>
    </div> -->
    <!--====== End - Dashboard Features ======-->
</div>