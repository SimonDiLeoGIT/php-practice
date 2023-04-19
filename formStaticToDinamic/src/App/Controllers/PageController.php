<?php

  namespace Paw\App\Controllers;

  class PageController {

    public string $viewsDir;

    public function __construct() {
      
      $this->viewsDir = __DIR__ . "/../views/";

      $this->menu = [

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

    }

    public function index() {

      $title = htmlspecialchars($_GET['nombre'] ?? "PAW");
      require $this->viewsDir . 'index.view.php';

    }

    public function services($procesado = false) {

      $main = "Services Page";
      $title = "Services Page";
      require $this->viewsDir . 'service.view.php';

    }

    public function contactProccess(){
      $formulario = $_POST;

      $this->services(true);
    }

    public function about() {

      $main = "Who We Are";
      $title = "About";
      require $this->viewsDir . 'about.view.php';

    }

  }

?>