<?php

namespace Modules\Project\Repositories;

use App\Repositories\BaseRepository;
use Modules\Project\Contracts\Repositories\ProjectDetailsRepositoryInterface;
use Modules\Project\Entities\ProjectDetail;

class ProjectDetailsRepository extends BaseRepository implements ProjectDetailsRepositoryInterface
{
    protected string $model = ProjectDetail::class;
}
