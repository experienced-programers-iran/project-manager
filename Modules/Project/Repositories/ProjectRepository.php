<?php

namespace Modules\Project\Repositories;

use Modules\Project\Contracts\Repositories\ProjectRepositoryInterface;
use Modules\Project\Entities\Project;
use Modules\Shared\Repositories\BaseRepository;

class ProjectRepository extends BaseRepository implements ProjectRepositoryInterface
{
    protected string $model = Project::class;
}
