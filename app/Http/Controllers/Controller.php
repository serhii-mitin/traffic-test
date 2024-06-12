<?php

namespace App\Http\Controllers;

use OpenApi\Attributes as OA;

#[
    OA\Info(version: "1.0.0", description: "api", title: "Test Api Documentation"),
    OA\Server(url: 'http://localhost:8080', description: "Local server"),
    OA\Server(url: 'https://test.dijoy.net', description: "Staging server"),
]
abstract class Controller
{
    //
}
