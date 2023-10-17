@extends('user.master')

@section('content')
<style>
    td,th{
        border: 1px solid grey;
    }
</style>
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
                                <a>Thông tin đơn hàng</a>
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
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-20">
                                <div class="dash__pad-2">
                                    <h1 class="dash__h1 u-s-m-b-14">Đơn hàng của tôi</h1>
                                    <table class="table table-togglable table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Thông tin khách</th>
                                                <th>Tổng tiền</th>
                                                <th data-breakpoints="xs sm md">Trạng thái</th>
                                                <th data-breakpoints="xs sm">HDV</th>
                                                <th data-breakpoints="xs sm">Địa điểm tour</th>
                                                <th data-breakpoints="xs sm">Thông tin chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $key => $order)
                                            <tr>
                                                <td class="text-center">{{$key+1}}</td>
                                                <td>
                                                    <b>Email</b> : {{$order['user']['email']}}<br>
                                                    <b>Tên</b> : {{$order['order']['ten']}}<br>
                                                    <b>SĐT</b> : {{$order['order']['sdt']}}<br>
                                                </td>
                                                <td>{{number_format($order['order']['amount'], 0, ',', '.')}}đ</td>
                                                <td  class="text-center">
                                                    @if($order['order']['orderStatus'] == 'Đang duyệt')
                                                        <span class="badge badge-light">{{$order['order']['orderStatus']}}</span>
                                                    @elseif($order['order']['orderStatus'] == 'Đã duyệt')
                                                        <span class="badge badge-success">{{$order['order']['orderStatus']}}</span>
                                                    @else
                                                        <span class="badge badge-danger">{{$order['order']['orderStatus']}}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @foreach($order['hostOrder'] as $hdv)
                                                    @php
                                                        try {
                                                            echo $employye_arr[$hdv]['name'].'<br>';
                                                        } catch (\Exception $e) {
                                                            echo 'Admin'.'<br>';
                                                        }
                                                    @endphp
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($order['order']['products'] as $address)
                                                    <div style="display: flex;">
                                                        <div>
                                                            <img width="80" src="{{$address['imageUrl']}}" /> 
                                                        </div>
                                                        <div style="display: flex; align-items:center">
                                                            {{$address['title']}} - giá {{number_format($address['price'], 0, ',', '.')}}đ x {{$order['order']['numberPeople']}}
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @if(!empty($order['order']['address']))
                                                        <span class="badge badge-secondary">Tour tự set</span>
                                                    @endif
                                                    @if(!empty($order['order']['place']))
                                                    <br>
                                                        <span class="badge badge-secondary">Nơi khởi hành : {{$order['order']['place']}}</span>
                                                    @endif
                                                    <br>
                                                    @if(isset($order['order']['payment']) && $order['order']['payment'] == 1 ) 
                                                        <span class="badge badge-success mt-1" style="background-color:green;color:white;border-radius: 5%;">Thanh toán lúc {{convert_date($order['order']['time_payment'])}}</span> 
                                                    @else <span class="badge badge-danger mt-1"  style="background-color:red;color:white;border-radius: 5%;"> Chưa thanh toán</span> 
                                                    @endif
                                                </td>
                                                <td width="220">
                                                    Ngày đặt : {{convert_date_2($order['order']['dateTime'])}}<br>
                                                    Ngày đi : {{convert_date_2($order['order']['startDate'])}}<br>
                                                    Ngày về : {{convert_date_2($order['order']['endDate'])}} @if($order['order']['endDate']=="") {{$order['order']['time']}} @endif<br>
                                                    Số người : {{$order['order']['numberPeople']}}
                                                    @if($order['order']['room'] == 1 ) <span class="badge badge-light">(Phòng đơn)</span> 
                                                    @else <span class="badge badge-teal">(Phòng nhóm)</span> 
                                                    @endif
                                                    @if(isset($order['order']['payment']) && $order['order']['payment'] == 1 ) 
                                                    @else
                                                    <form action="{{route('payment')}}" method="post">
                                                        @csrf   
                                                        @method('post')
                                                        <input type="hidden" name="order_id" value="{{$order['id']}}"/>
                                                        <input type="hidden" name="amount" value="{{$order['order']['amount']}}"/>
                                                        <input type="hidden" name="redirect" value=""/>
                                                        <button class="dash__custom-link btn--e-transparent-brand-b-2" style="padding: 5px;cursor: pointer;" type="submit" style="margin-top:2px">Thanh toán</button>
                                                    </form>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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