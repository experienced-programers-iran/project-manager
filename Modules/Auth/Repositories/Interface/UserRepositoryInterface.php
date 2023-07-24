<?php

namespace Modules\Auth\Repositories\Interface;

use Modules\Auth\Entities\User;
use Modules\Shared\Contracts\BaseRepositoryInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    //
    public function getByEmail($email):?User;
}
