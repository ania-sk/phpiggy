<?php 

declare(strict_types=1);

include __DIR__ . "/../../vendor/autoload.php";

use Framework\App;

$app = new App();

$app->get('/', ['App\Controllers\HomeControllers', 'home']);

dd($app);

return $app;