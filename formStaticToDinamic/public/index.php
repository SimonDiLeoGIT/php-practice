<?php

    require __DIR__ . '/../vendor/autoload.php';

    use Paw\App\Controllers\PageController;
    use Paw\App\Controllers\ErrorController;
    
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();

    /*throw new \Exception("Error pibe");*/


    $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

    $controller = new PageController;

    switch ($path) {
        case '/':
            $controller->index();
            break;
        case '/services':
            $controller->services();
            break;
            case '/about':
                $controller->about();
                break;
        default:
                $controller = new ErrorController;
                $controller->notFound();
            break;
    }


/*echo "<pre>";
var_dump($menu);
die;*/

/*echo "<pre>";
var_dump($_SERVER);
die;*/

?>