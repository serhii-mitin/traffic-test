<?php

namespace App\Http\Requests\Api\v2\Post;

use App\Enums\PostStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostStatusRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'status' => [
                'required',
                'integer',
                Rule::in(PostStatusEnum::getValues())
            ]
        ];
    }
}
