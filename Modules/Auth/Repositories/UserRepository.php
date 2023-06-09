<?php

namespace Modules\Auth\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\User;
use Modules\Auth\Repositories\Interface\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected string $model = User::class;

    public function getByEmail($email): ?User
    {
        return User::where('email', $email)->first();
    }
}
