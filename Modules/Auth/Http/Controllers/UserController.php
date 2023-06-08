<?php

namespace Modules\Auth\Http\Controllers;

use App\Services\ResponseService;
use Modules\Auth\Transformers\UserResource;

class UserController extends ResponseService
{
    public function get()
    {
        $user=\Auth::user();
        return $this->generateResponse(result: UserResource::make($user));
    }
}
