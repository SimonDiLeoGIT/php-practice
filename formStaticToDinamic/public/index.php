<?php

    require __DIR__ . '/../vendor/autoload.php';

    use Paw\App\Controllers\PageController;
    use Paw\App\Controllers\ErrorController;
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    $log = new Logger('mvc-app');
    $log->pushHandler(new StreamHandler(__DIR__ . '/../logs/app.log', Logger::DEBUG));

    

    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();

    /*throw new \Exception("Error pibe");*/



    $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

    $log->info("Petición a: {$path}");
    
    $controller = new PageController;

    switch ($path) {
        case '/':
            $controller->index();
            $log->info("Respuesta exitosa: 200");
            break;
        case '/services':
            $controller->services();
            $log->info("Respuesta exitosa: 200");
            break;
            case '/about':
                $controller->about();
                $log->info("Respuesta exitosa: 200");
                break;
        default:
                $controller = new ErrorController;
                $controller->notFound();
                $log->info("Path not Found: 404");
            break;
    }


    /*echo "<pre>";
    var_dump($menu);
    die;*/

    /*echo "<pre>";
    var_dump($_SERVER);
    die;*/

?>