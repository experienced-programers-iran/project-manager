<?php

namespace Modules\Auth\Http\Controllers;

use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Entities\User;
use Modules\Auth\Http\Requests\LoginRequest;
use Modules\Auth\Http\Requests\RegisterRequest;
use Modules\Auth\Transformers\UserResource;

class AuthController extends UserController
{
    public function register(RegisterRequest $request): JsonResponse
    {
        /** @var User $user */
        $user = $this->userRepository->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);


        $accessToken = $this->getAccessToken($user);
        $user->refresh();
        $user->accessToken = $accessToken;
        return $this->generateResponse(result: UserResource::make($user));
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $user = $this->userRepository->getByEmail($request->email);
        if ($user && Hash::check($request->password, $user->password)) {
            $accessToken = $this->getAccessToken($user);
            $user->accessToken = $accessToken;
            return $this->generateResponse(result: UserResource::make($user));
        }
        return $this->generateResponse(status: false, message: __('auth.attemptFailed'));
    }

    /**
     * @param User $user
     * @return string
     */
    public function getAccessToken(User $user): string
    {
        return $user->createToken('authToken')->accessToken;
    }
}
