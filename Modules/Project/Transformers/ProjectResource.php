<?php

namespace Modules\Project\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name ,
            'description' => $this->description ,
            'status' => $this->status ,
            'user' => $this->user ,
            'budget' => $this->detail->budget ,
            'start_date' => $this->detail->start_date ,
            'end_date' => $this->detail->end_date ,
        ];
    }
}

