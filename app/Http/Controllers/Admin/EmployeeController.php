<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Factory;
use Google\Cloud\Core\ExponentialBackoff;
use Google\Cloud\Firestore\FirestoreClient;
use Illuminate\Support\Facades\Http;

class EmployeeController extends Controller
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
        $this->menu('employee','employees');

        $collection = $this->firestore->collection('employees');
        $documents = $collection->documents();
        $users = [];
        foreach ($documents as $document) {
            $params = $document->data();
            $params['id'] = $document->id();
            array_push($users, $params);
        }

        return view('admin.employee.employee',[
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
        $this->menu('employee','employees');

        return view('admin.employee.create');
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
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required',
        ]);
        
        $params = [
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone,
        ];
        $collection = $this->firestore->collection('employees');
        // Thêm tài liệu mới với dữ liệu vào collection "users".
        $collection->add($params);

        return redirect()->route('employees.index')->with('success','Success');
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
        $this->menu('employee','employees');
        $user = $this->firestore->collection('employees')->document($id)->snapshot()->data();
        return view('admin.employee.edit',[
            'user' => $user,
            'id' => $id
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
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required',
        ]);
        
        $params = [
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone,
        ];
        $collection = $this->firestore->collection('employees')->document($id);
        // Thêm tài liệu mới với dữ liệu vào collection "users".
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
        $this->firestore->collection('employees')->document($id)->delete();
        return redirect()->back()->with('success','Success');
    }

}
