<?php

namespace App\Models;

use App\Enums\PostStatusEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'status',
    ];

    protected $casts = [
        'is_published' => 'boolean'
    ];

    protected function statusName(): Attribute
    {
        return Attribute::make(
            get: fn() => __('entities.post.statuses.' . $this->status),
        );
    }

    public function scopeIsActive(Builder $builder): Builder
    {
        return $builder->where(['status' => PostStatusEnum::ACTIVE->value]);
    }
}
