<?php declare(strict_types = 1);

namespace Nelwhix\ContactForm;

use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);

// Load all the environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Set up error page handling
$whoops = new \Whoops\Run;
if ($_ENV['APP_ENV'] !== 'production') {
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
} else {
    $whoops->pushHandler(function ($e) {
        echo "Friendly Error Page";
    });
}

$whoops->register();

// set up request/response object;
$request = new  \Http\HttpRequest($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
$response = new \Http\HttpResponse;


$routeDefinitionCallback = function (\FastRoute\RouteCollector $r) {
    $routes = include('Routes.php');

    foreach ($routes as $route) {
        $r->addRoute($route[0], $route[1], $route[2]);
    }
};

$dispatcher = \FastRoute\simpleDispatcher($routeDefinitionCallback);


foreach ($response->getHeaders() as $header) {
    header($header, false);
}

echo $response->getContent();