<?php

namespace Modules\Project\Http\Controllers;

use App\Services\ResponseService;
use Illuminate\Support\Facades\DB;
use Modules\Organization\Entities\Organization;
use Modules\Project\Contracts\Repositories\ProjectDetailsRepositoryInterface;
use Modules\Project\Contracts\Repositories\ProjectRepositoryInterface;
use Modules\Project\Enums\ProjectStatusEnums;
use Modules\Project\Http\Requests\StoreProjectRequest;
use Modules\Project\Repositories\ProjectRepository;

class ProjectController extends ResponseService
{
    protected ProjectRepository $projectRepository;
    protected ProjectDetailsRepositoryInterface $projectDetailsRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository, ProjectDetailsRepositoryInterface $projectDetailsRepository)
    {
        $this->projectRepository = $projectRepository;
        $this->projectDetailsRepository = $projectDetailsRepository;
    }
    public function store(StoreProjectRequest $request,Organization $organization)
    {

        try {

        return DB::transaction(function () use ($request,$organization) {

            $project = $this->projectRepository->create([
                'organization_id' =>$organization->id,
                'name' => $request->name,
                'status' => ProjectStatusEnums::JUST_STARTED,
                'description' => $request->description,
            ]);

            $project->projectDetail()->create([
                'project_id' => $project->id,
                'budget' => $request->budget,
                'start_at' => $request->start_at,
                'end_at' => $request->end_at,
            ]);
            return $this->generateResponse(
                result:$project,
                statusCode: 201
            );
        });
        }catch (\Exception $e){
            return $this->generateResponse(
                result: $e,
                status: false,
                message: 'Something went wrong',
                statusCode: 500
            );
        }

    }
}

