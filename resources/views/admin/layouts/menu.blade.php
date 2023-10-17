<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg sidebar-light">

    <!-- Sidebar content -->
    <div class="sidebar-content" id="sidebar-content" onscroll="scrollMenu(this)">
        <div class="sidebar-section">
            <div class="sidebar-section-header">
                <span class="font-weight-semibold">Thông tin chung</span>
                <div class="list-icons ml-auto">
                    <a href="#sidebar-block-buttons" class="list-icons-item">
                        <!-- <i class="icon-arrow-down12"></i> -->
                    </a>
                </div>
            </div>

            <div class="collapse show" id="sidebar-block-buttons">
                <div class="sidebar-section-body">
                    <div class="row">
                        <div class="col">
                            <a href="{{route('home')}}" class="btn btn-warning btn-block btn-float">
                                <i class="icon-stats-bars icon-2x"></i>
                                <span>Thống kê</span>
                            </a>

                            <a href="{{route('users.index')}}" class="btn btn-primary btn-block btn-float">
                                <i class="icon-user icon-2x"></i>
                                <span>User</span>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{route('foods.index')}}" type="button" class="btn btn-success btn-block btn-float">
                                <i class="icon-lasso2 icon-2x"></i>
                                <span>Món ăn</span>
                            </a>

                            <a href="{{route('orders.index')}}" type="button" class="btn btn-purple btn-block btn-float">
                                <i class="icon-magic-wand icon-2x"></i>
                                <span>Đơn hàng</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- User menu -->
        <img class="sidebar-section sidebar-user my-1" src="https://freegifimg.com/download/cooks-and-chefs/68293-cook-and-chef-gif-file-hd.gif">
        <!-- /user menu -->

    </div>
    <!-- /sidebar content -->
    
</div>