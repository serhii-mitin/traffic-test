<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v2\Post\UpdatePostStatusRequest;
use App\Services\Api\v2\PostService;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class PostActionController extends Controller
{
    public function __construct(protected readonly PostService $service)
    {
    }

    #[OA\Patch(
        path: "/api/v2/posts/{id}/update-status",
        summary: "Update post status",
        tags: ["v2 Posts"],
        parameters: [
            new OA\PathParameter(
                name: 'id',
                required: true,
                in: 'path',
                schema: new OA\Schema(type: 'integer', default: '1')
            )
        ],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\MediaType(
                mediaType: 'application/json',
                schema: new OA\Schema(
                    required: ["status"],
                    properties: [
                        new OA\Property(
                            property: 'status',
                            description: "Statuses: [0 - hidden, 1 - active]",
                            type: "integer"
                        )
                    ]
                )
            )
        ),
        responses: [
            new OA\Response(response: JsonResponse::HTTP_OK, description: "The post status was updated"),
            new OA\Response(response: JsonResponse::HTTP_NOT_FOUND, description: "The post not found"),
            new OA\Response(response: JsonResponse::HTTP_UNPROCESSABLE_ENTITY, description: "Incorrect status")
        ]
    )]
    public function updateStatus(UpdatePostStatusRequest $request, int $id): JsonResponse
    {
        $result = $this->service->updateStatusById($id, $request->status);

        return response()->json($result, $result->response_status);
    }
}
