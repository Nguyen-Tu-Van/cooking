<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
use Google\Cloud\Firestore\FirestoreClient;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function menu($open, $active)
    {
        Session::put('open', $open);
        Session::put('active', $active);
    }
    public function index()
    {
        $firestore = new FirestoreClient(['projectId' => 'cooking-89482']);
        $users = $firestore->collection('users')->documents();
        $users_arr = [];
        foreach ($users as $document) {
            $params = $document->data();
            array_push($users_arr, $params);
        }
        $products = $firestore->collection('products')->documents();
        $products_arr = [];
        foreach ($products as $document) {
            $params = $document->data();
            array_push($products_arr, $params);
        }
        $orders = $firestore->collection('orders')->documents();
        $orders_arr = [];
        $status1 = 0;
        $status2 = 0;
        $status3 = 0;
        $money1 = 0;
        $money2 = 0;
        $money3 = 0;
        $money4 = 0;
        // Lấy ngày giờ hiện tại
        $currentDateTime = date('Y-m-d'); // Lấy ngày và giờ dạng 'YYYY-MM-DDTHH:MM:SS'
        $currentDateTime2 = date('Y-m');
        $currentDateTime3 = date('Y');

        foreach ($orders as $document) {
            $params = $document->data();
            // if(isset($params['order']['time_payment']))
            // {
            //     echo $currentDateTime."^^^";
            //     convert_date_2($params['order']['time_payment']);
            //     echo '----------------------<br>';
            // }
            array_push($orders_arr, $params);
            if(isset($params['order']['orderStatus']) && $params['order']['orderStatus'] == 'Đang giao') $status1++;
            if(isset($params['order']['orderStatus']) && $params['order']['orderStatus'] == 'Đã giao') $status2++;
            if(isset($params['order']['orderStatus']) && $params['order']['orderStatus'] == 'Đã hủy') $status3++;
            if(isset($params['order']['payment']) && $params['order']['payment'] == 1) $money1+=$params['order']['amount'];
            if(isset($params['order']['payment']) && $params['order']['payment'] == 1 && $currentDateTime == convert_date_3($params['order']['time_payment'])) $money2+=$params['order']['amount'];
            if(isset($params['order']['payment']) && $params['order']['payment'] == 1 && $currentDateTime2 == convert_date_3_month($params['order']['time_payment'])) $money3+=$params['order']['amount'];
            if(isset($params['order']['payment']) && $params['order']['payment'] == 1 && $currentDateTime3 == convert_date_3_year($params['order']['time_payment'])) $money4+=$params['order']['amount'];
        }

        return view('admin.pages.index',[
            'num_user' => count($users_arr),
            'num_product' => count($products_arr),
            'num_order' => count($orders_arr),
            'status1' => $status1,
            'status2' => $status2,
            'status3' => $status3,
            'money1' => $money1,
            'money2' => $money2,
            'money3' => $money3,
            'money4' => $money4,
        ]);
    }
    public function login()
    {
        //return Session::has('user');
        if(Session::has('user') == 1 ) return redirect()->route('home'); 
        return view('Common.page.login');
        //return storage_path('app/firebase-adminsdk.json');
    }
    public function loginPost(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        try {
            $auth = (new Factory) ->withServiceAccount(storage_path('app/firebase-adminsdk.json'))->createAuth();
            $auth->signInWithEmailAndPassword($email, $password);
            $firestore = new FirestoreClient(['projectId' => 'cooking-89482']);
            $user = $firestore->collection('users')->document($auth->getUserByEmail($email)->uid)->snapshot()->data();
            if($user['admin'] == true) 
            {
                Session::put('user', $user);
                return redirect()->route('home')->with('info','Đăng nhập thành công');
            }
        } catch (\Throwable $th) {
            Session::forget('user');
            return redirect()->route('login')->with('error','Tài khoản hoặc mật khẩu không chính xác');
        }
        Session::forget('user');
        return redirect()->route('login')->with('error','Bạn không phải là admin');
    }
    public function signup()
    {
        //return Session::has('user');
        if(Session::has('user') == 1 ) return redirect()->route('house'); 
        return view('Common.page.signup');
        //return storage_path('app/firebase-adminsdk.json');
    }
    public function signupPost(Request $request)
    {
        if($request->password != $request->password2) return redirect()->route('signup')->with('error','Mật khẩu 2 lần không khớp');
        $firestore = new FirestoreClient(['projectId' => 'cooking-89482']);
        $collection = $firestore->collection('users');
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $auth = (new Factory) ->withServiceAccount(storage_path('app/firebase-adminsdk.json'))->createAuth();

        //check xem có trùng tài khoản không
        foreach ($collection->documents() as $document) {
            $params = $document->data();
            if($params['email'] == $request->email)
            {
                return redirect()->route('signup')->with('error','Email này đã được đăng kí');
            }
        }

        try {
            $params = [
                'email' => $request->email,
                'password' => $request->password
            ];
            $user = $auth->createUser($params);
            
            // Tạo một mảng dữ liệu mới với userId giống với id của tài liệu.
            $params = [
                'email' => $request->email,
                'admin' => $request->status == "1" ? true : false,
                'orders' => '',
                'userId' => $user->uid,
                'avt' => 'https://png.pngtree.com/png-clipart/20190921/original/pngtree-user-avatar-boy-png-image_4693645.jpg',
                'level' => 0
            ];
            $userDoc = $collection->document($user->uid);
            $userDoc->set($params);
        } catch (\Throwable $th) {
            //throw $th;
        }
        return redirect()->route('login')->with('success','Đăng kí thành công');

    }
    public function logout()
    {
        Session::forget('user');
        return redirect()->route('login')->with('error','Đăng xuất thành công');
    }
    public function complete()
    {
        return view('user.pages.complete');
    }
    public function payment(Request $request)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/my-order";
        $vnp_TmnCode = "2ZWEIDHK";//Mã website tại VNPAY 
        $vnp_HashSecret = "YIJCREOGDDMZQFLOKDAXVIIKYSYVTYFG"; //Chuỗi bí mật

        $vnp_TxnRef = $request->order_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán đơn hàng travlling';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = (int)$request->amount * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        // //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
        // //Billing
        // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
        // $vnp_Bill_Email = $_POST['txt_billing_email'];
        // $fullName = trim($_POST['txt_billing_fullname']);
        // if (isset($fullName) && trim($fullName) != '') {
        //     $name = explode(' ', $fullName);
        //     $vnp_Bill_FirstName = array_shift($name);
        //     $vnp_Bill_LastName = array_pop($name);
        // }
        // $vnp_Bill_Address=$_POST['txt_inv_addr1'];
        // $vnp_Bill_City=$_POST['txt_bill_city'];
        // $vnp_Bill_Country=$_POST['txt_bill_country'];
        // $vnp_Bill_State=$_POST['txt_bill_state'];
        // // Invoice
        // $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
        // $vnp_Inv_Email=$_POST['txt_inv_email'];
        // $vnp_Inv_Customer=$_POST['txt_inv_customer'];
        // $vnp_Inv_Address=$_POST['txt_inv_addr1'];
        // $vnp_Inv_Company=$_POST['txt_inv_company'];
        // $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
        // $vnp_Inv_Type=$_POST['cbo_inv_type'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            // "vnp_ExpireDate"=>$vnp_ExpireDate,
            // "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
            // "vnp_Bill_Email"=>$vnp_Bill_Email,
            // "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
            // "vnp_Bill_LastName"=>$vnp_Bill_LastName,
            // "vnp_Bill_Address"=>$vnp_Bill_Address,
            // "vnp_Bill_City"=>$vnp_Bill_City,
            // "vnp_Bill_Country"=>$vnp_Bill_Country,
            // "vnp_Inv_Phone"=>$vnp_Inv_Phone,
            // "vnp_Inv_Email"=>$vnp_Inv_Email,
            // "vnp_Inv_Customer"=>$vnp_Inv_Customer,
            // "vnp_Inv_Address"=>$vnp_Inv_Address,
            // "vnp_Inv_Company"=>$vnp_Inv_Company,
            // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
            // "vnp_Inv_Type"=>$vnp_Inv_Type
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);

        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }
}
