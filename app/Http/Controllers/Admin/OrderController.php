<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    protected $firestore;
    public function __construct()
    {
        $this->firestore = new FirestoreClient([
            'projectId' => 'cooking-89482',
        ]);
    }
    public function menu($open, $active)
    {
        Session::put('open', $open);
        Session::put('active', $active);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->menu('order','orders');

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
            $params['id'] = $order->id();
            $params['user'] = $users_arr[$order->data()['userOrder']];
            array_push($orders_arr, $params);
        }

        return view('admin.order.order',[
            'orders' => collect($orders_arr),
            'employye_arr' => $employye_arr
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->menu('order','orders');
        $collection = $this->firestore->collection('orders')->documents();
        $employees = [];
        foreach ($collection as $document) {
            $params = $document->data();
            $params['id'] = $document->id();
            array_push($employees, $params);
        }

        return view('admin.blog.create',[
            'employees' => $employees
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required',
            'title' => 'required',
            'imageUrl' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);
        $comments = $this->firestore->collection('commentProducts');
        $comment = $comments->add(["comment"=>[]]);
        $favorites = $this->firestore->collection('favorites');
        $favorite = $favorites->add(["number"=>0,"userIds"=>[]]);

        $products = $this->firestore->collection('products'); 
        $params = [
            'commentId' => $comment->id(),
            'creatorId' => $request->creatorId,
            'description' => $request->description,
            'favoriteId' => $favorite->id(),
            'type' => $request->type,
            'title' => $request->title,
            'imageUrl' => $request->imageUrl,
            'price' => (int)$request->price,
        ];
        // Thêm tài liệu mới với dữ liệu vào collection "products".
        $products->add($params);


        return redirect()->route('foods.index')->with('success','Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->menu('blog','blogs');
        $tour = $this->firestore->collection('products')->document($id)->snapshot();
        $collection = $this->firestore->collection('employees')->documents();
        $employees = [];
        foreach ($collection as $document) {
            $params = $document->data();
            $params['id'] = $document->id();
            array_push($employees, $params);
        }

        return view('admin.blog.edit',[
            'tour' => $tour->data(),
            'id' => $tour->id(),
            'employees' => $employees
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'creatorId' => 'required',
            'type' => 'required',
            'title' => 'required',
            'imageUrl' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);
        $collection = $this->firestore->collection('products')->document($id);
        $params = [
            'creatorId' => $request->creatorId,
            'description' => $request->description,
            'type' => $request->type,
            'title' => $request->title,
            'imageUrl' => $request->imageUrl,
            'price' => (int)$request->price,
        ];
        // Thêm tài liệu mới với dữ liệu vào collection "products".
        $collection->set($params, ['merge' => true]);

        return redirect()->back()->with('success','Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->firestore->collection('orders')->document($id)->delete();
        return redirect()->back()->with('success','Success');
    }
    public function approve($id)
    {
        $collection = $this->firestore->collection('orders')->document($id);
        $order = $collection->snapshot()->data();
        // Thêm tài liệu mới với dữ liệu vào collection "users".
        $order['order']['orderStatus'] = 'Đã duyệt';
        $collection->set([
            'order' => $order['order']
        ], ['merge' => true]);
        
        return redirect()->route('orders.index')->with('success','Success');
    }
    public function remove($id)
    {
        $collection = $this->firestore->collection('orders')->document($id);
        $order = $collection->snapshot()->data();
        // Thêm tài liệu mới với dữ liệu vào collection "users".
        $order['order']['orderStatus'] = 'Đã hủy';
        $collection->set([
            'order' => $order['order']
        ], ['merge' => true]);
        
        return redirect()->route('orders.index')->with('success','Success');
    }
    public function updateOrder(Request $request)
    {
        // Lấy ngày giờ hiện tại
        $currentDateTime = date('Y-m-d\TH:i:s'); // Lấy ngày và giờ dạng 'YYYY-MM-DDTHH:MM:SS'

        // Lấy phần thập phân của giây bằng microtime và định dạng nó thành 'u' (microseconds)
        list($usec, $sec) = explode(" ", microtime());
        $microseconds = sprintf("%06d", $usec);

        // Kết hợp phần thập phân với ngày giờ
        $timestampWithMicroseconds = $currentDateTime . '.' . $microseconds;

        $collection = $this->firestore->collection('orders')->document($request->orderId);
        $order = $collection->snapshot()->data();
        $amount = $order['order']['products'][0]['price']*(int)$request->numberPeople;
        $params['order'] = [
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'room' => (int)$request->room,
            'numberPeople' => (int)$request->numberPeople,
            'amount' => $amount,
            'payment' => (int)$request->payment,
            'time_payment' => $timestampWithMicroseconds
        ];
        // Thêm tài liệu mới với dữ liệu vào collection "products".
        $collection->set($params, ['merge' => true]);

        return redirect()->back()->with('success','Success');
    }
}
