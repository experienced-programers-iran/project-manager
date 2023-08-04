<?php

namespace Modules\Auth\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Auth\Entities\User;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        /** @var User $this */
        $result = [
            'name' => $this->name,
            'email' => $this->email,
        ];
        if (! empty($this->accessToken)) {
            $result['access_token'] = $this->accessToken;
        }

        return $result;
    }
}
