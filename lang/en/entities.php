<?php

use App\Enums\PostStatusEnum;

return [
    'post' => [
        'statuses' => [
            PostStatusEnum::HIDDEN->value => 'hidden',
            PostStatusEnum::ACTIVE->value => 'active',
        ]
    ]
];
