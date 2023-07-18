<?php

namespace Modules\Project\Http\Controllers;

use App\Services\ResponseService;
use Illuminate\Support\Facades\DB;
use Modules\Project\Contracts\Repositories\ProjectDetailsRepositoryInterface;
use Modules\Project\Contracts\Repositories\ProjectRepositoryInterface;
use Modules\Project\Entities\Project;
use Modules\Project\Enums\ProjectStatusEnums;
use Modules\Project\Http\Requests\StoreProjectRequest;
use Modules\Project\Repositories\ProjectRepository;
use Modules\Project\Transformers\ProjectResource;

class ProjectController extends ResponseService
{
    protected ProjectRepository $projectRepository;
    protected ProjectDetailsRepositoryInterface $projectDetailsRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository, ProjectDetailsRepositoryInterface $projectDetailsRepository)
    {
        $this->projectRepository = $projectRepository;
        $this->projectDetailsRepository = $projectDetailsRepository;
    }

    public function index()
    {
        $projects = Project::query()->latest()->get();
        return ProjectResource::collection($projects);
    }

    public function store(StoreProjectRequest $request)
    {
        DB::transaction(function () use ($request) {

            $project = $this->projectRepository->create([
                'user_id' => auth()->id(),
                'name' => $request->name,
                'status' => ProjectStatusEnums::JUST_STARTED,
                'description' => $request->description,
            ]);

            $this->projectDetailsRepository->create([
                'project_id' => $project->id,
                'budget' => $request->budget,
                'start_at' => $request->start_at,
                'end_at' => $request->end_at,
            ]);
        });

        return response()->json([
            'message' => 'project created successfully',
            'status' => 1,
            'data' => [],
        ]);
    }
}

