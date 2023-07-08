<?php

namespace Modules\Project\Repositories;

use App\Repositories\BaseRepository;
use Modules\Project\Entities\Project;
use Modules\Project\Repositories\Interface\ProjectRepositoryInterface;

class ProjectRepository extends BaseRepository implements ProjectRepositoryInterface
{
    protected string $model = Project::class;
}
