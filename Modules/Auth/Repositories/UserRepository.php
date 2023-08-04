<?php

namespace Modules\Auth\Repositories;

use Modules\Auth\Entities\User;
use Modules\Auth\Repositories\Interface\UserRepositoryInterface;
use Modules\Shared\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected string $model = User::class;

    public function getByEmail($email): ?User
    {
        return User::where('email', $email)->first();
    }
}
