<?php

namespace Paw\Core;

class Config {

  private array $configs;

  public function __construct(){
    
    # "INFO" setea una variable default en el caso de que 
    #  LOG_LEVEL no esté seteada
    $this->configs["LOG_LEVEL"] = getenv("LOG_LEVEL", "INFO");
    $path = getenv("LOG_PATH", "/logs/app.log");
    $this->configs["LOG_PATH"] = $this->joinPaths('..', $path);
  }

  # Funcion para concatenar correctamente los paths
  public function joinPaths(){
    $paths = array();
    foreach(func_get_args() as $arg) {
      if ($arg != '') {
        $paths[] = $arg;
      }
    }
    return preg_replace('#/+#', '/', join('/', $paths));
  }

  public function get($name){

    # Si no existe retorna nulo
    return $this->configs[$name] ?? null;
  }

}