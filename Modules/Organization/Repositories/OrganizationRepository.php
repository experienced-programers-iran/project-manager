<?php

namespace Modules\Organization\Repositories;

use App\Repositories\BaseRepository;
use Modules\Organization\Contracts\Repositories\OrganizationRepositoryInterface;
use Modules\Organization\Entities\Organization;

class OrganizationRepository extends BaseRepository implements OrganizationRepositoryInterface
{
    protected string $model = Organization::class;
}
