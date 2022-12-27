<?php declare(strict_types = 1);

namespace Nelwhix\ContactForm;

use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);

// Load all the environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();


$whoops = new \Whoops\Run;
if ($_ENV['APP_ENV'] !== 'production') {
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
} else {
    $whoops->pushHandler(function ($e) {
        echo "Friendly Error Page";
    });
}

$whoops->register();

throw new \Exception;
