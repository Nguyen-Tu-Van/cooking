<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\FirestoreService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Factory;
use Google\Cloud\Core\ExponentialBackoff;
use Google\Cloud\Firestore\FirestoreClient;
use Illuminate\Support\Facades\Http;
use Kreait\Firebase\Auth;

class UserController extends Controller
{
    protected $firestore;
    // public function __construct()
    // {
    //     $this->firestore = new FirestoreClient([
    //         'projectId' => 'cooking-89482',
    //     ]);
    // }
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
        $this->menu('user','users');
        $firestore = new FirestoreClient(['projectId' => 'cooking-89482']);
        $collection = $firestore->collection('users');
        $documents = $collection->documents();
        $users = [];
        foreach ($documents as $document) {
            $params = $document->data();
            $params['id'] = $document->id();
            array_push($users, $params);
        }

        return view('admin.user.user',[
            'users' => collect($users)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->menu('user','users');
        return view('admin.user.create');
    }

    // public function register($email, $password)
    // {
    //     $data = [
    //         'email' => $email,
    //         'password' => $password,
    //         'returnSecureToken' => true
    //     ];
    //     $response = Http::post('https://identitytoolkit.googleapis.com/v1/accounts:signUp?key=AIzaSyAJNLHgnvyg5HUYBv411XcGeAyfgR5axdg', $data);
    //     // Check for a successful response
    //     if ($response->successful()) {
    //         // Do something with the response
    //         $data = $response->json();
    //     } else {
    //         // Handle errors
    //         $statusCode = $response->status();
    //         $data = $response->json();
    //     }
    //     return $data;
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
                return redirect()->back()->with('error','Email này đã được đăng kí');
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
                'name' => $request->name,
                'gender' => $request->gender == "1" ? "1" : "0",
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

        return redirect()->route('users.index')->with('success','Success');
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
        $this->menu('user','users');

        $firestore = new FirestoreClient(['projectId' => 'cooking-89482']);
        $user = $firestore->collection('users')->document($id)->snapshot()->data();
        return view('admin.user.edit',[
            'user' => $user
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
        $firestore = new FirestoreClient(['projectId' => 'cooking-89482']);
        if($request->has('newPassword'))
        {
            $data = $request->validate([
                'newPassword' => 'required|min:6',
            ]);
            $auth = (new Factory) ->withServiceAccount(storage_path('app/firebase-adminsdk.json'))->createAuth();
            $auth->updateUser($id, [
                'password' => $request->newPassword
            ]);
        }
        
        // Lấy reference đến tài liệu cần sửa.
        $userRef = $firestore->collection('users')->document($id);

        // Kiểm tra xem tài liệu có tồn tại hay không.
        if (!$userRef->snapshot()->exists()) {
            return response()->json(['message' => 'Không tìm thấy người dùng với ID này'], 404);
        }

        // Sử dụng phương thức update để cập nhật dữ liệu của tài liệu.
        $userRef->set(['admin' => $request->status == "1" ? true : false], ['merge' => true]);
        $userRef->set(['gender' => $request->gender??'0'], ['merge' => true]);
        $userRef->set(['name' => $request->name], ['merge' => true]);
        
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
        try {
            $auth = (new Factory) ->withServiceAccount(storage_path('app/firebase-adminsdk.json'))->createAuth();
            $auth->deleteUser($id);
            $firestore = new FirestoreClient(['projectId' => 'cooking-89482']);
            $firestore->collection('users')->document($id)->delete();
        } catch (\Throwable $th) {
            //throw $th;
        }
        return redirect()->back()->with('success','Success');
    }

  
}
