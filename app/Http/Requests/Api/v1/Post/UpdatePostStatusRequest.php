<?php

namespace App\Http\Requests\Api\v1\Post;

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
                Rule::in(PostStatusEnum::getValues()),
                Rule::notIn([$this->route('post')->status])
            ]
        ];
    }
}
