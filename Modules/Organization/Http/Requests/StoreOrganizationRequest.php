<?php

namespace Modules\Organization\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrganizationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => [
                'string','required','max:255'
            ],
            'logo' => [
                'file','image','nullable'
            ],
            'description' => [
                'string','nullable'
            ],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
