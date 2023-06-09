<?php

namespace Modules\Auth\Http\Controllers;

use App\Services\ResponseService;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Entities\User;
use Modules\Auth\Http\Requests\RegisterRequest;
use Modules\Auth\Repositories\Interface\UserRepositoryInterface;
use Modules\Auth\Transformers\UserResource;

class AuthController extends ResponseService
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function register(RegisterRequest $request)
    {
        /** @var User $user */
        $user=$this->userRepository->create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password'))
        ]);



        $token = $user->createToken('AuthToken')->accessToken;
        $user->refresh();
        $user->accessToken=$token;

        return $this->generateResponse(result:UserResource::make($user));
    }

    public function getUser()
    {
        $user=\Auth::user();
        return $this->generateResponse(result: UserResource::make($user));
    }
}
