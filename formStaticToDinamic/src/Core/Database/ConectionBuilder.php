<?php

namespace Paw\Core\Database;

use PDO;
use PDOException;
use Paw\Core\Config;
use Paw\Core\Traits\Loggable;

class ConectionBuilder
{

  use Loggable;

  public function make(Config $config): PDO
  {
    try {
      $adapter = $config->get('DB_ADAPTER');
      $hostname = $config->get('DB_HOSTAME');
      $dbName = $config->get('DB_DBNAME');
      $port = $config->get('DB_PORT');
      $charset = $config->get('DB_CHARSET');

      return new PDO(
        "{$adapter}:host={$hostname};dbname={$dbName};
          port={$port};charset={$charset}",
        $config->get('DB_USERNAME'),
        $config->get('DB_PASSWORD'),
        [
          'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
          ]
        ]
      );
    } catch (PDOException $e) {
      $this->logger->error('Internal Server Error', ["Error" => $e]);
      die("Error Interno - Consulte a administrador");
    }

  }

}