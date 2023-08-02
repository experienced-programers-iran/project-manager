<?php

namespace Modules\Organization\Http\Controllers;

use App\Services\ResponseService;
use Illuminate\Support\Facades\DB;
use Modules\Organization\Contracts\Repositories\OrganizationRepositoryInterface;
use Modules\Organization\Http\Requests\StoreOrganizationRequest;
use Modules\Organization\Transformers\OrganizationResource;

class OrganizationController extends ResponseService
{
    protected OrganizationRepositoryInterface $organizationRepository;

    public function __construct(OrganizationRepositoryInterface $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
    }

    public function store(StoreOrganizationRequest $request)
    {
        return DB::transaction(function () use ($request) {

            //todo create upload file module to upload organization logo
            $project = $this->organizationRepository->create([
                'user_id' => auth()->id(),
                'name' => $request->name,
                'description' => $request->description,
                //                'logo' => $request->description,
            ]);
            if ($project) {
                return $this->generateResponse(
                    result: OrganizationResource::make($project)
                );
            } else {
                return $this->generateResponse(
                    status: false
                );
            }
        });

    }
}
