<?php

namespace App\Services;

use Google\Cloud\Core\ExponentialBackoff;
use Google\Cloud\Firestore\FirestoreClient;
use Illuminate\Support\Facades\Cache;

class FirestoreService
{
    public static $client;

    public static function getClient()
    {
        self::$client = Cache::get('firestore')?? null;
        if (is_null(self::$client)) {
            self::$client = new FirestoreClient(['projectId' => 'cooking-89482']);
            Cache::put('firestore',self::$client,1000);
        }

        return self::$client;
    }
}
