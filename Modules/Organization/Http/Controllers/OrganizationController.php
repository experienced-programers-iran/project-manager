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

            $user=\Auth::user();
            //todo create upload file module to upload organization logo
            $organization=$user->organizations()->create([
                'name' => $request->name,
                'description' => $request->description,
            ]);
            if ($organization) {
                return $this->generateResponse(
                    result: OrganizationResource::make($organization)
                );
            } else {
                return $this->generateResponse(
                    status: false
                );
            }
        });

    }
}
