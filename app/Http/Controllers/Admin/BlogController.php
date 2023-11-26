<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blogs\RequestStore;
use App\Http\Requests\Blogs\RequestUpdate;
use Google\Cloud\Firestore\FieldValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Google\Cloud\Firestore\FirestoreClient;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    protected $firestore;
    public function __construct()
    {
        $this->firestore = new FirestoreClient([
            'projectId' => 'cooking-89482',
            'credentials' => storage_path('app/firebase-adminsdk.json')
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
        $this->menu('blog','blogs');

        $collection = $this->firestore->collection('products')->documents();
        $tours = [];
        foreach ($collection as $document) {
            $params = $document->data();
            $params['id'] = $document->id();
            array_push($tours, $params);
        }

        $usersx = $this->firestore->collection('users')->documents();
        $users = [];
        foreach ($usersx as $document) {
            $users[$document->id()] = $document->data();
        }

        $favorites = $this->firestore->collection('favorites')->documents();
        $favorites_arr = [];
        foreach ($favorites as $user) {
            $favorites_arr[$user->id()] = $user->data();
        }

        return view('admin.blog.blog',[
            'tours' => collect($tours),
            'users' => collect($users),
            'favorites_arr' => $favorites_arr
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->menu('blog','blogs');
        $collection = $this->firestore->collection('employees')->documents();
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
            'time' => 'required',
            'imageUrl' => 'required',
            'description' => 'required',
            'price' => 'required',
            'ingredient' => 'required'
        ]);
        $comments = $this->firestore->collection('commentProducts');
        $comment = $comments->add(["comment"=>[]]);
        $favorites = $this->firestore->collection('favorites');
        $favorite = $favorites->add(["number"=>0,"userIds"=>[]]);

        $products = $this->firestore->collection('products'); 
        $params = [
            'commentId' => $comment->id(),
            'creatorId' => Session::get('user')['userId'],
            'description' => $request->description,
            'favoriteId' => $favorite->id(),
            'type' => $request->type,
            'title' => $request->title,
            'time' => $request->time,
            'imageUrl' => $request->imageUrl,
            'price' => (int)$request->price,
            'ingredient' => $request->ingredient
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

        return view('admin.blog.edit',[
            'tour' => $tour->data(),
            'id' => $tour->id(),
            'employees' => $employees,
            'comment_arr' => $comment_arr,
            'users_arr' => $users_arr
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
            'type' => 'required',
            'title' => 'required',
            'time' => 'required',
            'imageUrl' => 'required',
            'description' => 'required',
            'price' => 'required',
            'ingredient' => 'required'
        ]);
        $collection = $this->firestore->collection('products')->document($id);
        $params = [
            'description' => $request->description,
            'type' => $request->type,
            'title' => $request->title,
            'time' => $request->time,
            'imageUrl' => $request->imageUrl,
            'price' => (int)$request->price,
            'ingredient' => $request->ingredient
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
        $this->firestore->collection('products')->document($id)->delete();
        return redirect()->back()->with('success','Success');
    }

    public function remove($blog_id,$comment_id)
    {
        $commentProducts = $this->firestore->collection('commentProducts')->document($blog_id);
        $arr_comment = [];
        foreach($commentProducts->snapshot()->data()['comment'] as $key => $item)
        {
            if($key!=$comment_id) array_push($arr_comment,$item);
        }
        $params = [
            'comment' => $arr_comment
        ];
        $commentProducts->set($params, ['merge' => true]);
        return redirect()->back()->with('success','Success');
    }
    public function updateStatus($blog_id,$index,$status)
    {
        $collection = $this->firestore->collection('products')->document($blog_id);
        // Thêm tài liệu mới với dữ liệu vào collection "products".
        $arr_comment = [];
        foreach($collection->snapshot()->data()['reports'] as $key => $item)
        {
            array_push($arr_comment,$item);
        }
        $arr_comment[$index]['status'] = (int)$status;
        $collection->set([
            'reports' => $arr_comment
        ], ['merge' => true]);

        return redirect()->back()->with('success','Success');
    }

    public function report()
    {
        $collection = $this->firestore->collection('products')->documents();
        $products = [];
        foreach ($collection as $document) {
            $params = $document->data();
            $params['id'] = $document->id();
            array_push($products, $params);
        }

        return view('admin.blog.report',[
            'products' => $products
        ]);
    }
}
