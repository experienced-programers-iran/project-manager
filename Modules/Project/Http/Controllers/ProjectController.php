<?php

namespace Modules\Project\Http\Controllers;

use App\Services\ResponseService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Project\Repositories\Interface\ProjectRepositoryInterface;
use Modules\Project\Repositories\ProjectRepository;

class ProjectController extends ResponseService
{
    protected ProjectRepository $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
