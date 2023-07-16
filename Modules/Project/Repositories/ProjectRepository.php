<?php

namespace Modules\Project\Repositories;

use App\Repositories\BaseRepository;
use Modules\Project\Contracts\Repositories\ProjectRepositoryInterface;
use Modules\Project\Entities\Project;

class ProjectRepository extends BaseRepository implements ProjectRepositoryInterface
{
    protected string $model = Project::class;
}
