<?php

require __DIR__ . '/../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Dotenv\Dotenv;

use Paw\Core\Database\ConectionBuilder;
use Paw\Core\Router;
use Paw\Core\Config;
use Paw\Core\Request;

$dotenv = Dotenv::createUnsafeImmutable(__DIR__ . '/../');
$dotenv->load();

$config = new Config;

# Formas de pedir un valor a DotEnv
# getenv("LOG_LEVEL");
# $_ENV["LOG_LEVEL"];

$log = new Logger('mvc-app');
$handler = new StreamHandler($config->get("LOG_PATH"));
$handler->setLevel($config->get("LOG_LEVEL"));
$log->pushHandler($handler);

$connectionBulilder = new ConectionBuilder();
$connectionBulilder->setLogger($log);
$connection = $connectionBulilder->make($config);

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$request = new Request();

$router = new Router;
$router->setLogger($log);
$router->get('/', 'PageController@index');
$router->get('/about', 'PageController@about');
$router->get('/services', 'PageController@services');
$router->post('/services', 'PageController@contactProccess');
$router->get('/authors', 'AuthorController@index');
$router->get('/author', 'AuthorController@get');
$router->get('/author/edit', 'AuthorController@edit');
$router->post('/author/edit', 'AuthorController@set');

?>