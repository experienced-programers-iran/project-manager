<?php

namespace Modules\Auth\Http\Controllers;

use App\Services\ResponseService;
use Modules\Auth\Repositories\Interface\UserRepositoryInterface;
use Modules\Auth\Transformers\UserResource;

class UserController extends ResponseService
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function getUser()
    {
        $user=\Auth::user();
        return $this->generateResponse(result: UserResource::make($user));
    }

}
