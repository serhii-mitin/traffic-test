<?php

namespace App\Repositories\Api\v2\Contracts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

interface PostRepositoryContract
{
    public function getAllByStatusWithoutContent(int $status): Collection;

    public function updateStatus(Post $post, int $status): bool;
}
