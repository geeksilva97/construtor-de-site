<?php
  /*
    Classe que manipula os drives de banco de dados 21/04/2016
    @author Edigleysson Silva <edigleyssonsilva@gmail.com>
    @version 1.0
  */
  class Drive{
  
    private static $drive;
    
    
    private function __construct(){}
    
    public static function set($drive){
      self::$drive = strtolower($drive);
    }
    
    public static function getConnection($host, $database, $user, $password, $port=NULL){
      return new Connection( $host,$database, $user, $password, self::$drive, $port );
    }
    
  
  }// fim da classe
  
?>
