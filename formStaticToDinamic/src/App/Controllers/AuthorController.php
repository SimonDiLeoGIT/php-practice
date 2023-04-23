<?php

namespace Paw\App\Controllers;

use Paw\Core\Controller;
use Paw\App\Models\AutoresCollection;

class AuthorController extends Controller
{

  public ?string $modelName = AutoresCollection::class;

  public function index()
  {
    $title = "Autores";
    $authors = $this->model->getAll();
    require $this->viewsDir . 'authors.index.view.php';
  }

  public function get()
  {
    global $request;
    $authorId = $request->get('id');
    $author = $this->model->get($authorId);
    $title = "Autor";
    require $this->viewsDir . 'authors.show.view.php';
  }

  public function edit()
  {

  }

  public function set()
  {

  }
}