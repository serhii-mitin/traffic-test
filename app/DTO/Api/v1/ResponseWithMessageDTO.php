<?php

namespace App\DTO\Api\v1;

use Spatie\LaravelData\Data;

class ResponseWithMessageDTO extends Data
{
    public function __construct(
        public int     $response_status,
        public ?string $message,
    )
    {
    }
}
