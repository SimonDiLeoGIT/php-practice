<?php

namespace Paw\Core;

class Config
{

  private array $configs;

  public function __construct()
  {

    # "INFO" setea una variable default en el caso de que 
    #  LOG_LEVEL no esté seteada
    $this->configs["LOG_LEVEL"] = getenv("LOG_LEVEL", "INFO");
    $path = getenv("LOG_PATH", "/logs/app.log");
    $this->configs["LOG_PATH"] = $this->joinPaths('..', $path);

    $this->configs['DB_ADAPTER'] = getenv('DB_ADAPTER') ?? 'mysql';
    $this->configs['DB_HOSTNAME'] = getenv('DB_HOSTNAME') ?? 'localhost';
    $this->configs['DB_DBNAME'] = getenv('DB_DBNAME') ?? 'mvc_paw_diley';
    $this->configs['DB_USERNAME'] = getenv('DB_USERNAME') ?? 'paw';
    $this->configs['DB_PASSWORD'] = getenv('DB_PASSWORD') ?? 'paw';
    $this->configs['DB_PORT'] = getenv('DB_PORT') ?? '3306';
    $this->configs['DB_CHARSET'] = getenv('DB_CHARSET') ?? 'utf8';
  }

  # Funcion para concatenar correctamente los paths
  public function joinPaths()
  {
    $paths = array();
    foreach (func_get_args() as $arg) {
      if ($arg != '') {
        $paths[] = $arg;
      }
    }
    return preg_replace('#/+#', '/', join('/', $paths));
  }

  public function get($name)
  {

    # Si no existe retorna nulo
    return $this->configs[$name] ?? null;
  }

}