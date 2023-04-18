<?php

    require __DIR__ . '/../vendor/autoload.php';

    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();

    /*throw new \Exception("Error pibe");*/

    $menu = [

        [
            "href" => "/",
            "name" => "Home"
        ],
        
        [
            "href" => "/about",
            "name" => "Who We Are"
        ],
        
        [
            "href" => "/services",
            "name" => "Services"
        ],

    ];

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

switch ($path) {
    case '/':
        $title = htmlspecialchars($_GET['nombre'] ?? "PAW");
        require __DIR__ . '/../src/index.view.php';
        break;
    case '/services':
        $main = "Services Page";
        require __DIR__ . '/../src/service.view.php';
        break;
        case '/about':
            $main = "Who We Are";
            require __DIR__ . '/../src/about.view.php';
            break;

    
    default:
            http_response_code(404);
            require __DIR__ . '/../src/not-found.view.php';
        break;
}


/*echo "<pre>";
var_dump($menu);
die;*/

/*echo "<pre>";
var_dump($_SERVER);
die;*/

?>