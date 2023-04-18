<?php

    require __DIR__ . '/../vendor/autoload.php';

    use Paw\Core\Router;
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    $log = new Logger('mvc-app');
    $log->pushHandler(new StreamHandler(__DIR__ . '/../logs/app.log', Logger::DEBUG));

    

    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();

    $router = new Router;
    $router->loadRoutes('/', 'PageController@index');
    $router->loadRoutes('/about', 'PageController@about');
    $router->loadRoutes('/services', 'PageController@services');
    $router->loadRoutes('not_found', 'ErrorController@notFound');
    $router->loadRoutes('internal_error', 'ErrorController@internalError');