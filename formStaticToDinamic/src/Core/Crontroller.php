<?php

namespace Paw\Core;

use Paw\Core\Model;

class Controller
{
  public string $viewsDir;
  public ?string $modelName = null;

  public function __construct()
  {
    global $connection, $log;

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

    if (!is_null($this->modelName)) {
      $qb = new QueryBuilder($connection, $log);
      $model = new $this->modelName;
      $model->setQueryBuilder($qb);
      $this->setModel($model);
    }

  }

  public function setModel(Model $model)
  {
    $this->model = $model;
  }
}