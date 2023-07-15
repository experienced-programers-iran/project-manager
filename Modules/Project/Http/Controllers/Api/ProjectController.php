<?php

namespace Modules\Project\Http\Controllers\Api;

use App\Services\ResponseService;
use Illuminate\Support\Facades\DB;
use Modules\Project\Http\Requests\StoreProjectRequest;
use Modules\Project\Repositories\Interface\ProjectRepositoryInterface;
use Modules\Project\Repositories\ProjectRepository;

class ProjectController extends ResponseService
{
    protected ProjectRepository $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function store(StoreProjectRequest $request)
    {
        DB::transaction(function () use ($request) {
            #todo create project and project details
        });
    }
}
