<?php

namespace App\Services\Api\v2;

use App\DTO\Api\v2\ResponseWithMessageDTO;
use App\Enums\PostStatusEnum;
use App\Models\Post;
use App\Repositories\Api\v2\Contracts\PostRepositoryContract;
use App\Services\AbstractService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class PostService extends AbstractService
{
    public function __construct(protected readonly PostRepositoryContract $repository)
    {
    }

    public function getAllActivePosts(): Collection
    {
        return $this->repository->getAllByStatusWithoutContent(PostStatusEnum::ACTIVE->value);
    }

    public function getById(int $id): Post
    {
        return $this->repository->findByIdOrFail($id);
    }

    public function updateStatusById(int $id, int $status): ResponseWithMessageDTO
    {
        try {
            $post = $this->repository->findByIdOrFail($id);
            if ($post->status != $status) {
                $this->repository->updateStatus($post, $status);
            }
        } catch (\Throwable) {
            return ResponseWithMessageDTO::validateAndCreate([
                'response_status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => __('notifications.post_status_not_updated'),
            ]);
        }

        return ResponseWithMessageDTO::validateAndCreate([
            'response_status' => JsonResponse::HTTP_OK,
            'message' => __('notifications.post_status_updated'),
        ]);
    }
}
