<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Google\Cloud\Core\ExponentialBackoff;
use Google\Cloud\Firestore\FirestoreClient;

class FirebaseController extends Controller
{

    protected $firestore;
    public function __construct()
    {
        $this->firestore = new FirestoreClient([
            'projectId' => 'cooking-89482',
        ]);
    }

    public function addData()
    {
        $data = [
            'email' => 'johndoe@example.com',
            'admin' => false,
        ];

        $this->firestore->collection('users')->add($data);

        return "Data added to Firestore!";
    }

    public function getData()
    {
        $collection = $this->firestore->collection('users');
        $documents = $collection->documents();
        $arr = [];
        foreach ($documents as $document) {
            array_push($arr, $document->data());
        }
        return json_encode($arr);
    }

}
