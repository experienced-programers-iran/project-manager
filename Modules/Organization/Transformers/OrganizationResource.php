<?php

namespace Modules\Organization\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Auth\Transformers\UserResource;
use Modules\Organization\Entities\Organization;

class OrganizationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        #todo show file(logo) in resource
        /** @var Organization $this */
        return [
            'name'=>$this->name,
            'users'=>UserResource::collection($this->users),
            'description'=>$this->description,
            'logo'=>$this->logo,
        ];
    }
}
