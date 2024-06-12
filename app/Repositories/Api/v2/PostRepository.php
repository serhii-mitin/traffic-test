<?php

namespace App\Repositories\Api\v2;

use App\Models\Post;
use App\Repositories\Api\v2\Contracts\PostRepositoryContract;
use Illuminate\Database\Eloquent\Collection;

class PostRepository extends AbstractRepository implements PostRepositoryContract
{
    public function __construct()
    {
        $this->model = new Post;
    }

    public function getAllByStatusWithoutContent(int $status): Collection
    {
        return $this->model
            ->select(['id', 'slug', 'title', 'excerpt', 'status', 'created_at'])
            ->isActive()
            ->get();
    }

    public function updateStatus(Post $post, int $status): bool
    {
        return $post->update([
            'status' => $status
        ]);
    }
}
