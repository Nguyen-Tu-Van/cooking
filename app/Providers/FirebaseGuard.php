<?php

namespace App\Providers;

use Illuminate\Auth\SessionGuard;
use Kreait\Firebase\Auth as FirebaseAuth;
use Illuminate\Contracts\Auth\UserProvider;

class FirebaseGuard extends \Illuminate\Auth\SessionGuard
{
    protected $firebaseAuth;

    public function __construct(UserProvider $provider, FirebaseAuth $firebaseAuth)
    {
        parent::__construct('firebase', $provider, $this->app->session, $this->app->request);

        $this->firebaseAuth = $firebaseAuth;
    }

    protected function getFirebaseUser($token)
    {
        try {
            return $this->firebaseAuth->verifyIdToken($token);
        } catch (\Throwable $e) {
            return null;
        }
    }

    public function user()
    {
        if ($this->user !== null) {
            return $this->user;
        }

        $token = $this->request->bearerToken();

        if (!$token) {
            return null;
        }

        $firebaseUser = $this->getFirebaseUser($token);

        if (!$firebaseUser) {
            return null;
        }

        return $this->user = $this->provider->retrieveById($firebaseUser->getUid());
    }
}
