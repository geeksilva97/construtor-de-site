<?php
  
  class SqlDelete extends SqlInstruction{
     
 
    
    public function release($conn, $release=TRUE){
  
	    $table = $this->table;
			if(is_object($this->table)){
				$table = $this->table->getTable();
			}
	
  	  $condition = $this->getLiteralWhere();
	
      $this->query="DELETE FROM {$table} {$condition} {$this->limit}";
      
      $del = $conn->prepareStatement($this->query);
      return ($release) ? $del->execute() : 'CONSULTA NÃO EXECUTADA';      
      
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
