<?php

namespace Modules\Organization\Repositories;

use Modules\Organization\Contracts\Repositories\OrganizationRepositoryInterface;
use Modules\Organization\Entities\Organization;
use Modules\Shared\Repositories\BaseRepository;

class OrganizationRepository extends BaseRepository implements OrganizationRepositoryInterface
{
    protected string $model = Organization::class;
}
