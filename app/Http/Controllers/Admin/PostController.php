<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
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
        $this->menu('post','posts');

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
        

        return view('admin.post.post',[
            'posts' => collect($posts),
            'users_arr' => $users_arr
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->menu('blog','blogs');
        // $collection = $this->firestore->collection('employees')->documents();
        // $employees = [];
        // foreach ($collection as $document) {
        //     $params = $document->data();
        //     $params['id'] = $document->id();
        //     array_push($employees, $params);
        // }

        // return view('admin.blog.create',[
        //     'employees' => $employees
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->validate([
        //     'type' => 'required',
        //     'title' => 'required',
        //     'imageUrl' => 'required',
        //     'description' => 'required',
        //     'price' => 'required',
        // ]);
        // $comments = $this->firestore->collection('commentProducts');
        // $comment = $comments->add(["comment"=>[]]);
        // $favorites = $this->firestore->collection('favorites');
        // $favorite = $favorites->add(["number"=>0,"userIds"=>[]]);

        // $products = $this->firestore->collection('products'); 
        // $params = [
        //     'commentId' => $comment->id(),
        //     'creatorId' => $request->creatorId,
        //     'description' => $request->description,
        //     'favoriteId' => $favorite->id(),
        //     'type' => $request->type,
        //     'title' => $request->title,
        //     'imageUrl' => $request->imageUrl,
        //     'price' => (int)$request->price,
        // ];
        // // Thêm tài liệu mới với dữ liệu vào collection "products".
        // $products->add($params);


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
        // $this->menu('blog','blogs');
        // $tour = $this->firestore->collection('products')->document($id)->snapshot();
        // $collection = $this->firestore->collection('employees')->documents();
        // $employees = [];
        // foreach ($collection as $document) {
        //     $params = $document->data();
        //     $params['id'] = $document->id();
        //     array_push($employees, $params);
        // }

        // $commentProducts = $this->firestore->collection('commentProducts')->documents();
        // $comment_arr = [];
        // foreach ($commentProducts as $comment) {
        //     $comment_arr[$comment->id()] = $comment->data();
        // }

        // $users = $this->firestore->collection('users')->documents();
        // $users_arr = [];
        // foreach ($users as $user) {
        //     $users_arr[$user->id()] = $user->data();
        // }

        // return view('admin.blog.edit',[
        //     'tour' => $tour->data(),
        //     'id' => $tour->id(),
        //     'employees' => $employees,
        //     'comment_arr' => $comment_arr,
        //     'users_arr' => $users_arr
        // ]);
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
        // $data = $request->validate([
        //     'creatorId' => 'required',
        //     'type' => 'required',
        //     'title' => 'required',
        //     'imageUrl' => 'required',
        //     'description' => 'required',
        //     'price' => 'required',
        // ]);
        // $collection = $this->firestore->collection('products')->document($id);
        // $params = [
        //     'creatorId' => $request->creatorId,
        //     'description' => $request->description,
        //     'type' => $request->type,
        //     'title' => $request->title,
        //     'imageUrl' => $request->imageUrl,
        //     'price' => (int)$request->price,
        // ];
        // // Thêm tài liệu mới với dữ liệu vào collection "products".
        // $collection->set($params, ['merge' => true]);

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
        $this->firestore->collection('post')->document($id)->delete();
        return redirect()->back()->with('success','Success');
    }
}
