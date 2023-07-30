<?php

namespace Modules\Organization\Repositories;

use App\Repositories\BaseRepository;
use Modules\Organization\Entities\Organization;
use Modules\Organization\Contracts\Repositories\OrganizationRepositoryInterface;
use Modules\Project\Entities\Project;

class OrganizationRepository extends BaseRepository implements OrganizationRepositoryInterface
{
    protected string $model = Organization::class;
}
