<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\ResponseController;
use App\Models\User;
use Modules\Auth\Http\Requests\RegisterRequest;

class AuthController extends ResponseController
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $token = $user->createToken('AuthToken')->accessToken;

        return $this->generateResponse(result:$token );
    }
}
