<?php

namespace App\Services\Api\v1;

use App\DTO\Api\v1\ResponseWithMessageDTO;
use App\Models\Post;
use App\Services\AbstractService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class PostService extends AbstractService
{
    public function getAllActivePosts(): Collection
    {
        return Post::query()
            ->select(['id', 'slug', 'title', 'excerpt', 'status', 'created_at'])
            ->isActive()
            ->get();
    }

    public function updateStatus(Post $post, int $newStatus): ResponseWithMessageDTO
    {
        $post->update([
            'status' => $newStatus
        ]);

        return ResponseWithMessageDTO::validateAndCreate([
            'response_status' => JsonResponse::HTTP_OK,
            'message' => __('notifications.post_status_updated'),
        ]);
    }
}
