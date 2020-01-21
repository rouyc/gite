<?php

class Conf {
  
  static private $debug = True; 
    
  static public function getDebug() {
    return self::$debug;
  }

  static private $databases = array(
    'hostname' => 'projetgikvadmin.mysql.db',
    'database' => 'projetgikvadmin',
    'login' => 'projetgikvadmin',
    'password' => 'Azerty12'
  );
   
  static public function getHostname() {
    //en PHP l'indice d'un tableau n'est pas forcement un chiffre.
    return self::$databases['hostname'];
  }

  static public function getDatabase() {
    //en PHP l'indice d'un tableau n'est pas forcement un chiffre.
    return self::$databases['database'];
  }

  static public function getLogin() {
    //en PHP l'indice d'un tableau n'est pas forcement un chiffre.
    return self::$databases['login'];
  }

  static public function getPassword() {
    //en PHP l'indice d'un tableau n'est pas forcement un chiffre.
    return self::$databases['password'];
  }
}
?>