<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\Post\PostListResource;
use App\Http\Resources\Api\v1\Post\PostResource;
use App\Models\Post;
use App\Services\Api\v1\PostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use OpenApi\Attributes as OA;

class PostController extends Controller
{
    public function __construct(protected readonly PostService $service)
    {
    }


    #[OA\Get(
        path: "/api/v1/posts",
        summary: "List all active posts",
        tags: ["v1 Posts"],
        responses: [
            new OA\Response(response: JsonResponse::HTTP_OK, description: "posts retrieved success")
        ]
    )]
    public function index(): AnonymousResourceCollection
    {
        $posts = $this->service->getAllActivePosts();

        return PostListResource::collection($posts);
    }

    #[OA\Get(
        path: "/api/v1/posts/{id}",
        summary: "Single Post",
        tags: ["v1 Posts"],
        parameters: [
            new OA\PathParameter(
                name: 'id',
                required: true,
                in: 'path',
                schema: new OA\Schema(type: 'integer', default: '1')
            ),
        ],
        responses: [
            new OA\Response(response: JsonResponse::HTTP_OK, description: "the post retrieved success"),
            new OA\Response(response: JsonResponse::HTTP_NOT_FOUND, description: "the post not found")
        ]
    )]
    public function show(Post $post): PostResource
    {
        return PostResource::make($post);
    }
}
