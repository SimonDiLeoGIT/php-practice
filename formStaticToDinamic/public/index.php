<?php

require __DIR__ . '/../src/bootstrap.php';

use Paw\Core\Exceptions\RouteNotFoundException;


/*$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
$log->info("Petición a: {$method} {$path}");*/

$router->direct($request);

/*try {
$router->direct($request);
$log->info("Status Code: 200 - {$path}");
} catch (RouteNotFoundException $e){
$router->direct('not_found');
$log->info("Path not Found: 404 Route Not Found", ["Error" => $e]);
} catch (Exception $e){
$router->direct('internal_error');
$log->error("Status Code: 500 - Internal Server Error", ["Error" => $e]);
}*/


/*echo "<pre>";
var_dump($menu);
die;*/

/*echo "<pre>";
var_dump($_SERVER);
die;*/

?>