<?php
  
  class SqlSelect extends SqlInstruction{
    
	private $fields;  
	private $inner; 

	public function setFields(){
		$this->fields = func_get_args();	
	} 
    
    public function release($conn, $release=TRUE){
      $table = $this->table;
	if(is_object($this->table)){
	  $table = $this->table->getTable();
	}

	if($table === ''){
		throw new Exception('Selecione a tabela usando o método setTable()');
	}

	//$valuesEncrypt = $this->getEncript(count($this->getValues()));
	

	$fields = $this->fields ? implode(',', $this->fields) : '*';
	
	$condition = $this->getLiteralWhere();
	
	$this->query = "SELECT {$fields} FROM {$table} {$this->inner} {$condition} {$this->limit}";
	
	$get = $conn->prepareStatement($this->query);
	$get->execute();

	return $get;
      
    }
    
    public function getEncript($n){
      $list = array();
      for($i=0; $i<$n; $i++){
	$list[] = '?';
      }// fim do loop for
      
      return implode(',', $list);
    }
    
    public function valToStr($values){
    $list = array();
    $n = count($values);
      for($i=0; $i<$n; $i++){
	$list[] = '\''.$values[$i].'\'';
      }
      
      return $list;
    }
    
   
    public function getValues(){
      return array_values($this->data);
    }

	public function innerJoin(Table $table, array $fields=array()){
		$this->inner = 'INNER JOIN '.$table->getTable().' AS '.$table->getAliaseTable().' ON ('.$fields[0].' = '.$fields[1].')';
	}


	
    
    
  }
  
?>
