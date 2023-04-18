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
    $router->get('/', 'PageController@index');
    $router->get('/about', 'PageController@about');
    $router->get('/services', 'PageController@services');
    $router->post('/services', 'PageController@contactProccess');
    $router->get('not_found', 'ErrorController@notFound');
    $router->get('internal_error', 'ErrorController@internalError');