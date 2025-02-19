<?php

declare(strict_types=1);

namespace App\Config;

use App\Middleware\{
    TemplateDataMiddleware,
    ValidationExceptionMiddleware,
    SessionMiddleware
};
use Framework\App;

function registerMiddleware(App $app)
{
    $app->addMiddleware(TemplateDataMiddleware::class);
    $app->addMiddleware(ValidationExceptionMiddleware::class);
    $app->addMiddleware(SessionMiddleware::class);
}
