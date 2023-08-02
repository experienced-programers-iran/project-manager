<?php

namespace Modules\Auth\Repositories\Interface;

use App\Repositories\Interface\BaseRepositoryInterface;
use Modules\Auth\Entities\User;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    //
    public function getByEmail($email): ?User;
}
