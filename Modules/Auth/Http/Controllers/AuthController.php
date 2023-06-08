<?php

namespace Modules\Auth\Http\Controllers;

use App\Services\ResponseService;
use Modules\Auth\Entities\User;
use Modules\Auth\Http\Requests\RegisterRequest;
use Modules\Auth\Transformers\UserResource;

class AuthController extends ResponseService
{
    public function register(RegisterRequest $request)
    {
        $user = new User();
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=bcrypt($request->input('password'));
        $user->save();



        $token = $user->createToken('AuthToken')->accessToken;
        $user->refresh();
        $user->accessToken=$token;

        return $this->generateResponse(result:UserResource::make($user));
    }
}
