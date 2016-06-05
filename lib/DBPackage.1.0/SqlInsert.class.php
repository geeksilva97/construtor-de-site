<?php
  
  class SqlInsert extends SqlInstruction{
    
    
    
   
    
    /**
    * adicionar esse método a classe pai
    */
    public function setRowData($field, $value){
      $this->data[$field]=$value;
    }
    
    public function release($conn, $release=TRUE){
	if(!(is_object($conn) && get_class($conn) === 'Connection')){
		throw new Exception('É esperado um objeto de conexão da classe Connection');
	}

      $table = $this->table;
	if(is_object($this->table)){
	  $table = $this->table->getTable();
	}
	
     $valuesEncrypt = $this->getEncript(count($this->getValues()));
     $fields = implode(',', array_keys($this->data));
	
	$this->query="INSERT INTO {$table} ({$fields}) VALUES ({$valuesEncrypt})";
      
      $insert = $conn->prepareStatement($this->query);
      return ($release) ? $insert->execute($this->getValues()) : 'CONSULTA NÃO EXECUTADA';      
      
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
