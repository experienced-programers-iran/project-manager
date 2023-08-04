<?php

namespace Modules\Project\Repositories;

use Modules\Project\Contracts\Repositories\ProjectDetailsRepositoryInterface;
use Modules\Project\Entities\ProjectDetail;
use Modules\Shared\Repositories\BaseRepository;

class ProjectDetailsRepository extends BaseRepository implements ProjectDetailsRepositoryInterface
{
    protected string $model = ProjectDetail::class;
}
