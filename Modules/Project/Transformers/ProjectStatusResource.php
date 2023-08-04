<?php

namespace Modules\Project\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Organization\Transformers\OrganizationResource;
use Modules\Project\Entities\Project;
use Modules\Project\Enums\ProjectStatusEnums;

class ProjectStatusResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        /** @var ProjectStatusEnums $this */
        return [
            'id'=>$this->value,
            'name'=>$this->name,
        ];
    }
}
