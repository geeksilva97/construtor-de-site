<?php
  
  abstract class SqlInstruction{
    
    protected $table;
    protected $query;
	protected $whereFields=[];
	protected $whereValues=[];
	protected $limit;
	protected $data;
    
     public function setTable($table){
      if(is_object($table)){
				if(!get_class($table) == 'Table'){
					throw new Exception('Unexpected class \"'.get_class($table).'\"');
				}	
      }
      
      $this->table = $table;
    }
    

	
    public function setRowData($field, $value){
      $this->data[$field]=$value;
    }

    public function getInstruction(){
      return $this->query;
    }

		public function addCondition($field,$operator, $value){
			$this->whereFields[] = $field;
			$this->whereValues[] = $operator.' \''.$value.'\'';
		}

		public function AND_OPERATOR($index){
			if(isset($this->whereValues[$index-1])){
				$this->whereValues[$index-1] = $this->whereValues[$index-1].' AND';
			}			
		}

		public function OR_OPERATOR($index){
			if(isset($this->whereValues[$index-1])){
				$this->whereValues[$index-1] = $this->whereValues[$index-1].' OR';
			}
		}
	
	public function getLiteralWhere(){
		$where = [];
		$count = count($this->whereValues);
		
		for($i=0; $i<$count; $i++){
			$where[] = $this->whereFields[$i].' '.$this->whereValues[$i];
			
		}

		return ($count > 0) ? 'WHERE '.implode(' ', $where) : '';
	}

	public function limit($index, $offset=NULL){
		if($offset === 0 && $index !== 0){
			$this->limit ='LIMIT '.$index;
		}else if($offset !== 0 && $index !== 0){
			$this->limit ='LIMIT '.$index.','.$offset;
		}else{
			$this->limit = '';
		}	
	}
    
    
      
    
    
  }
  
?>
