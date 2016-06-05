<?php
  /*
    Classe que manipula ações referentes as tabelas
    @author Edigleysson Silva <edigleyssonsilva@gmail.com>
    @version 1.0
  */
  class Table{
    
    protected $table;//nome da tabela
    protected $aliase;//apelido da tabela
    
    
    public function __construct($table, $aliase=''){
      $this->table = $table;
      $this->aliase=$aliase;
    }
    
    public function getTable(){
      return $this->table;
    }
    
    public function getAliaseTable(){
      return $this->aliase;
    }
    
  }// fim da class
  
  
?>