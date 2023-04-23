<?php

namespace Paw\App\Controllers;

use Paw\Core\Controller;

class PageController extends Controller
{

  public function index()
  {

    $title = "Home";
    $main = "Home";
    require $this->viewsDir . 'index.view.php';

  }

  public function services($procesado = false)
  {

    $main = "Services Page";
    $title = "Services Page";
    require $this->viewsDir . 'service.view.php';

  }

  public function contactProccess()
  {
    $formulario = $_POST;

    $this->services(true);
  }

  public function about()
  {

    $main = "Who We Are";
    $title = "About";
    require $this->viewsDir . 'about.view.php';

  }

}

?>