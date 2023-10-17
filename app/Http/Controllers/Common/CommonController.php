<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Google\Cloud\Firestore\FirestoreClient;
use Illuminate\Support\Facades\Session;

class CommonController extends Controller
{
    protected $firestore;
    public function __construct()
    {
        $this->firestore = new FirestoreClient([
            'projectId' => 'cooking-89482',
            'credentials' => storage_path('app/firebase-adminsdk.json')
        ]);
    }
    public function index()
    {
        $slides = [
            "https://mytourcdn.com/upload_images/Image/trungNew%20Folder/aNew%20Folder/b/c/d/e/f/f/g/h/hl%205.jpg",
            "https://image.vietgoing.com/editor/image_gfy1638345032.jpg",
            "https://img.meta.com.vn/Data/image/2022/05/24/7-ky-quan-the-gioi-4.jpg",
            "https://image.vietgoing.com/editor/image_gfy1638345032.jpg"
        ];
        $tours_type = [
            "Sinh Thái",
            "Văn hóa",
            "Nghỉ Dưỡng",
            "Giải Trí",
            "Thể Thao",
            "Khám Phá",
            "Mạo Hiểm",
            "Kết Hợp",
            "Nước Ngoài"
        ];
        $collection = $this->firestore->collection('products')->documents();
        $tours = [];
        foreach ($collection as $document) {
            $params = $document->data();
            $params['id'] = $document->id();
            array_push($tours, $params);
        }

        $favorites = $this->firestore->collection('favorites')->documents();
        $favorites_arr = [];
        foreach ($favorites as $user) {
            $favorites_arr[$user->id()] = $user->data();
        }

        return view('user.pages.index',[
            'slides' => $slides,
            'category_product_show' => [],
            'blogs_pin' => [],
            'tours_type' => $tours_type,
            'tours' => collect($tours),
            'favorites_arr' => $favorites_arr
        ]);
    }
    public function travelling($name,$id)
    {
        $documents = $this->firestore->collection('products')->documents();
        $tour = [];
        foreach ($documents as $document) {
            if($id == $document->id())
            {
                $tour = $document->data();
                $tour['id'] = $id;
                break;
            }
        }
        $collection = $this->firestore->collection('favorites')->documents();
        $favorites = [];
        foreach ($collection as $document) {
            $favorites[$document->id()] = $document->data();
        }

        $commentProducts = $this->firestore->collection('commentProducts')->documents();
        $comment_arr = [];
        foreach ($commentProducts as $comment) {
            $comment_arr[$comment->id()] = $comment->data();
        }

        $users = $this->firestore->collection('users')->documents();
        $users_arr = [];
        foreach ($users as $user) {
            $users_arr[$user->id()] = $user->data();
        }

        if(Session::has('user'))
            $check_favorite = array_search(Session::get('user')['userId'], $favorites[$tour['favoriteId']]['userIds']);
        else $check_favorite = false;

        $collection = $this->firestore->collection('products')->documents();
        $tours = [];
        foreach ($collection as $document) {
            $params = $document->data();
            $params['id'] = $document->id();
            array_push($tours, $params);
        }

        return view('user.pages.product_detail',[
            'tour' => $tour,
            'id' => $id,
            'check_favorite' => $check_favorite,
            'comment_arr' => $comment_arr,
            'users_arr' => $users_arr,
            'tours' => collect($tours)
        ]);
    }
    public function addComment(Request $request)
    {
        if(!Session::has('user')) return 0;
        $collection = $this->firestore->collection('commentProducts')->document($request->id);
        $comment_arr['comment'] = [];
        try {
            foreach ($collection->snapshot()->data()['comment'] as $comment) {
                array_push($comment_arr['comment'], $comment);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
        array_push($comment_arr['comment'], [
            'content' => $request->content,
            'userCommentId' => Session::get('user')['userId']
        ]);
        $collection->set($comment_arr, ['merge' => true]);

        return 1;
    }

    public function favorites()
    {
        if(Session::has('user') == false) return redirect()->route('login')->with('error','Bạn cần login để xem danh sách yêu thích');
        $collection = $this->firestore->collection('favorites')->documents();
        $favorites = [];
        $favorites_arr = [];
        foreach ($collection as $document) {
            if(array_search(Session::get('user')['userId'],$document->data()['userIds']) !== false)
            {
                array_push($favorites, $document->id());
            }
            $favorites_arr[$document->id()] = $document->data();
        }

        $collection = $this->firestore->collection('products')->documents();
        $tours = [];
        foreach ($collection as $document) {
            if(array_search($document->data()['favoriteId'],$favorites) !== false)
            {
                $params = $document->data();
                $params['id'] = $document->id();
                array_push($tours, $params);
            }
        }

        return view('user.pages.blog',[
            'tours' => collect($tours),
            'favorites_arr' => $favorites_arr
        ]);
    }
    
    public function favorite($id)
    {
        if(!Session::has('user')) return redirect()->route('login')->with('error','Bạn cần login để thực hiện chức năng yêu thích');
        $collection = $this->firestore->collection('favorites')->document($id);
        $list_user = [];
        foreach ($collection->snapshot()->data()['userIds'] as $document) {
            array_push($list_user, $document);
        }
        $key = array_search(Session::get('user')['userId'], $list_user);
        if ($key !== false) {
            unset($list_user[$key]);
        }
        else array_push($list_user, Session::get('user')['userId']);
        $collection->set(['userIds' => $list_user], ['merge' => true]);

        return redirect()->back()->with('success','Success');
    }

    public function comment(Request $request)
    {
        if(!Session::has('user')) return redirect()->route('login')->with('error','Bạn cần login để thực hiện chức năng comment');
        $collection = $this->firestore->collection('post')->document($request->postId);
        $list_comment = [];
        foreach ($collection->snapshot()->data()['comment'] as $document) {
            array_push($list_comment, $document);
        }
        array_push($list_comment, [
            'content' => $request->comment,
            'email' => Session::get('user')['email'],
            'idUser' => Session::get('user')['userId']
        ]);

        $collection->set(['comment' => $list_comment], ['merge' => true]);

        return redirect()->back()->with('local',$request->local);
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('user');
        }
        return view('common.page.login');
    }
    public function loginPost(Request $request)
    {
        $params = ['email' => $request->email, 'password' => $request->password];
        if ($request->remember == "on") {
            Cookie::queue(Cookie::make('email_cookie_user', $request->email, 10000));
            Cookie::queue(Cookie::make('password_cookie_user', $request->password, 10000));
        } else {
            Cookie::queue(Cookie::forget('email_cookie_user'));
            Cookie::queue(Cookie::forget('password_cookie_user'));
        }
        if (Auth::attempt($params)) {
            if (Auth::user()->status == 2) {
                $this->logout();
                return redirect()->route('login')->with('error', 'Tài khoản của bạn đang bị khóa');
            } else return redirect()->route('user');
        }

        return redirect()->route('login')->with('error', 'Tài khoản hoặc mật khẩu không chính xác');
    }
    public function register()
    {
        if (Auth::check()) {
            return redirect()->route('user');
        }
        return view('common.page.register');
    }
    public function registerPost(Request $request)
    {
        $params = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'avatar'=>'',
            'gender'=>$request->gender,
            'phone'=>'',
            'address'=>'',
            'birthday'=>null,
            'check_mail'=>'1',
            'status'=>'1',
            'describe'=>''
        ];
        // $this->user_repo->create($params);
        return redirect()->route('login')->with('success','Đăng kí tài khoản thành công. Đăng nhập tại đây');
    }

    
    public function logout()
    {
        Auth::logout();
        Cookie::queue(Cookie::forget('email_cookie_user'));
        Cookie::queue(Cookie::forget('password_cookie_user'));

        return redirect()->route('home')->with('info', 'Đăng xuất thành công');
    }

    public function post()
    {
        if(Session::has('user')) $id = Session::get('user')['userId'];
        else $id = '0';
        $collection = $this->firestore->collection('post');
        $documents = $collection->documents();
        $posts = [];
        foreach ($documents as $document) {
            $params = $document->data();
            $params['id'] = $document->id();
            array_push($posts, $params);
        }
        $users = $this->firestore->collection('users')->documents();
        $users_arr = [];
        foreach ($users as $user) {
            $users_arr[$user->id()] = $user->data();
        }
        return view('user.pages.post',[
            'posts' => collect($posts),
            'users_arr' => $users_arr,
            'id' => $id
        ]);
    }
    public function like($postId,$local)
    {
        if(!Session::has('user')) return redirect()->route('login')->with('error','Bạn cần login để thực hiện chức năng like bài');
        $collection = $this->firestore->collection('post')->document($postId);
        $list_user = [];
        foreach ($collection->snapshot()->data()['like'] as $document) {
            array_push($list_user, $document);
        }
        $key = array_search(Session::get('user')['userId'], $list_user);
        if ($key !== false) {
            unset($list_user[$key]);
        }
        else array_push($list_user, Session::get('user')['userId']);
        $collection->set(['like' => $list_user], ['merge' => true]);

        return redirect()->back()->with('local',$local);
    }
    public function postCreate(Request $request)
    {
        if(!Session::has('user')) return redirect()->route('login')->with('error','Bạn cần login để thực hiện chức năng đăng bài');
        // Lấy ngày giờ hiện tại
        $currentDateTime = date('Y-m-d\TH:i:s'); // Lấy ngày và giờ dạng 'YYYY-MM-DDTHH:MM:SS'

        // Lấy phần thập phân của giây bằng microtime và định dạng nó thành 'u' (microseconds)
        list($usec, $sec) = explode(" ", microtime());
        $microseconds = sprintf("%06d", $usec);

        // Kết hợp phần thập phân với ngày giờ
        $timestampWithMicroseconds = $currentDateTime . '.' . $microseconds;

        // In ra giá trị thời gian
        $params = [
            'comment' => [],
            'content' => $request->post,
            'createDate' => $timestampWithMicroseconds,
            'like' => [],
            'userPost' => Session::get('user')['userId']
        ];
        $collection = $this->firestore->collection('post');
        // Thêm tài liệu mới với dữ liệu vào collection "users".
        $collection->add($params);
        return redirect()->back()->with('local',0);
    }
    public function search(Request $request)
    {
        $collection = $this->firestore->collection('products')->documents();
        $tours = [];
        foreach ($collection as $document) {
            $params = $document->data();
            if($request->keyword == '')
            {
                $params['id'] = $document->id();
                array_push($tours, $params);
            }
            else if(stristr($params['title'],$request->keyword))
            {
                $params['id'] = $document->id();
                array_push($tours, $params);
            }
        }

        return view('user.pages.search',[
            'tours' => collect($tours)
        ]);
    }
    public function profile()
    {
        if(!Session::has('user')) return redirect()->route('login')->with('error','Bạn cần login để xem profile');
        return view('user.account.profile');
    }
    public function profilePost(Request $request)
    {
        $params = [
            'avt' => $request->avatar,
        ];
        $collection = $this->firestore->collection('users')->document(Session::get('user')['userId']);
        // Thêm tài liệu mới với dữ liệu vào collection "users".
        $collection->set($params, ['merge' => true]);
        Session::put('user', $collection->snapshot()->data());
        return redirect()->back()->with('success','OK');
    }
    public function order(Request $request)
    {
        if(!Session::has('user')) return redirect()->route('login')->with('error','Bạn cần login để thực hiện chức năng đặt tour');
         // Lấy ngày giờ hiện tại
         $currentDateTime = date('Y-m-d\TH:i:s'); // Lấy ngày và giờ dạng 'YYYY-MM-DDTHH:MM:SS'

         // Lấy phần thập phân của giây bằng microtime và định dạng nó thành 'u' (microseconds)
         list($usec, $sec) = explode(" ", microtime());
         $microseconds = sprintf("%06d", $usec);
 
         // Kết hợp phần thập phân với ngày giờ
         $timestampWithMicroseconds = $currentDateTime . '.' . $microseconds;

        $collection = $this->firestore->collection('products');
        $documents = $collection->documents();
        $tour = [];
        foreach ($documents as $document) {
            if($request->product == $document->id())
            {
                $tour = $document->data();
                $tour['id'] = $request->product;
                break;
            }
        }
        $amount = $request->numberPeople * $tour['price'];
        $params = [
            'hostOrder' => [$tour['creatorId']],
            'order' => [
               'address' => '',
               'amount' => $amount,
               'dateTime' => $timestampWithMicroseconds,
               'endDate' => $request->endDate,
               'id' => 'o2023-10-03T21:57:47.165912',
               'numberPeople' => $request->numberPeople,
               'orderStatus' => 'Đang duyệt',
               'products' => [[
                    'creatorIdProduct' => $tour['creatorId'],
                    'id' => 'o2023-10-03T21:57:47.165912',
                    'imageUrl' => $tour['imageUrl'],
                    'price' => $tour['price'],
                    'quantity' => 1,
                    'title' => $tour['title'],
               ]],
               'room' => $request->room,
               'sdt' => $request->sdt,
               'startDate' => $request->startDate,
               'ten' => $request->ten,
               'time' => $request->time,
               'place' => $request->place
            ],
            'userOrder' => Session::get('user')['userId']
        ];
        $collection = $this->firestore->collection('orders');
        // Thêm tài liệu mới với dữ liệu vào collection "users".
        $collection->add($params);

        return redirect()->route('complete')->with('success','OK');
    }
    public function orderTour()
    {
        if(!Session::has('user')) return redirect()->route('login')->with('error','Bạn cần login để thực hiện chức năng đặt tour');

        $collection = $this->firestore->collection('employees');
        $documents = $collection->documents();
        $users = [];
        foreach ($documents as $document) {
            $params = $document->data();
            $params['id'] = $document->id();
            array_push($users, $params);
        }

        return view('user.pages.order_tour',[
            'users' => collect($users)
        ]);
    }
    public function orderTourPost(Request $request)
    {
        // Lấy ngày giờ hiện tại
        $currentDateTime = date('Y-m-d\TH:i:s'); // Lấy ngày và giờ dạng 'YYYY-MM-DDTHH:MM:SS'

        // Lấy phần thập phân của giây bằng microtime và định dạng nó thành 'u' (microseconds)
        list($usec, $sec) = explode(" ", microtime());
        $microseconds = sprintf("%06d", $usec);

        // Kết hợp phần thập phân với ngày giờ
        $timestampWithMicroseconds = $currentDateTime . '.' . $microseconds;

        $amount = 1 * $request->price;
        $params = [
            'hostOrder' => [$request->employeId],
            'order' => [
               'address' => $request->address,
               'amount' => $amount,
               'dateTime' => $timestampWithMicroseconds,
               'endDate' => $request->endDate,
               'id' => 'o2023-10-03T21:57:47.165912',
               'numberPeople' => $request->numberPeople,
               'orderStatus' => 'Đang duyệt',
               'products' => [[
                    'creatorIdProduct' => $request->employeId,
                    'id' => 'o2023-10-03T21:57:47.165912',
                    'imageUrl' => '',
                    'price' => $amount,
                    'quantity' => 1,
                    'title' => $request->address,
               ]],
               'room' => $request->room,
               'sdt' => $request->sdt,
               'startDate' => $request->startDate,
               'ten' => $request->ten,
            ],
            'userOrder' => Session::get('user')['userId']
        ];
        $collection = $this->firestore->collection('orders');
        // Thêm tài liệu mới với dữ liệu vào collection "users".
        $collection->add($params);

        return redirect()->route('complete')->with('success','OK');
    }
    public function myOrder(Request $request)
    {
        if($request->vnp_ResponseCode == '00' )
        {
            // Lấy ngày giờ hiện tại
            $currentDateTime = date('Y-m-d\TH:i:s'); // Lấy ngày và giờ dạng 'YYYY-MM-DDTHH:MM:SS'

            // Lấy phần thập phân của giây bằng microtime và định dạng nó thành 'u' (microseconds)
            list($usec, $sec) = explode(" ", microtime());
            $microseconds = sprintf("%06d", $usec);

            // Kết hợp phần thập phân với ngày giờ
            $timestampWithMicroseconds = $currentDateTime . '.' . $microseconds;

            $firestore = new FirestoreClient(['projectId' => 'cooking-89482']);
            $collection = $firestore->collection('orders')->document($request->vnp_TxnRef);
            $params['order'] = [
                'payment' => 1,
                'time_payment' => $timestampWithMicroseconds
            ];
            // Thêm tài liệu mới với dữ liệu vào collection "products".
            $collection->set($params, ['merge' => true]);
            return redirect()->route('myOrder');
        }
        if(!Session::has('user')) return redirect()->route('login')->with('error','Bạn cần login để thực hiện chức năng đặt tour');
        $orders = $this->firestore->collection('orders')->documents();
        $users = $this->firestore->collection('users')->documents();
        $employees = $this->firestore->collection('employees')->documents();
        $users_arr = [];
        foreach ($users as $user) {
            $users_arr[$user->id()] = $user->data();
        }
        $employye_arr = [];
        foreach ($employees as $employye) {
            $employye_arr[$employye->id()] = $employye->data();
        }
        // return $users_arr;

        $orders_arr = [];
        foreach ($orders as $order) {
            $params = $order->data();
            if($params['userOrder'] == Session::get('user')['userId'])
            {
                $params['id'] = $order->id();
                $params['user'] = $users_arr[$order->data()['userOrder']];
                array_push($orders_arr, $params);
            }
        }
        return view('user.account.order',[
            'orders' => collect($orders_arr),
            'employye_arr' => $employye_arr
        ]);
    }
}
