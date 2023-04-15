<?php

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
        require __DIR__ . '/../src/index_view.php';
        break;
    case '/services':
        $main = "Services Page";
        require __DIR__ . '/../src/service_view.php';
        break;
    
    default:
        echo "Page Not Found";
        break;
}


/*echo "<pre>";
var_dump($menu);
die;*/

/*echo "<pre>";
var_dump($_SERVER);
die;*/

?>