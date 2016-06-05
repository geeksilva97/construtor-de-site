<?php
  
  class SqlUpdate extends SqlInstruction{
    
    
		
    
   
   
    
    public function release($conn, $release=TRUE){
      $table = $this->table;
	if(is_object($this->table)){
	  $table = $this->table->getTable();
	}

	if($table === ''){
		throw new Exception('Selecione a tabela usando o método setTable()');
	}

	//$valuesEncrypt = $this->getEncript(count($this->getValues()));
	$fields = array_keys($this->data);
	$count = count($fields);

	for($i=0; $i<$count; $i++){
		$fields[$i] = $fields[$i].'=?';
	}

	$fields = implode(',', $fields);
	
	$condition = $this->getLiteralWhere();
	
	$this->query = "UPDATE {$table} SET {$fields} {$condition} {$this->limit}";
	
	$up = $conn->prepareStatement($this->query);
        return ($release) ? $up->execute($this->getValues()) : 'CONSULTA NÃO EXECUTADA';  

      
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


	
    
    
  }
  
?>
