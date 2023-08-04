<?php

namespace Modules\Project\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Organization\Transformers\OrganizationResource;
use Modules\Project\Entities\Project;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        /** @var Project $this */
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'organization'=>OrganizationResource::make($this->organization),
            'description'=>$this->description,
            'status'=>ProjectStatusResource::make($this->status),
        ];
    }
}
