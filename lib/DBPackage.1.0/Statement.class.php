<?php
  
  class Statement{
    
    protected $query;
//     protected $result;
    protected $conn;
    private $exec;
    
    
    public function __construct(PDO $conn, $query){
      $this->conn = $conn;
      $this->query=$query;
    }
    
    public function setQuery($query){
      $this->query = $query;
    }
    
    public function setConn($conn){
      $this->conn = $conn;
    }
    
    public function execute(array $values=array()){
	$this->exec = $this->conn->prepare($this->query);
	return $this->exec->execute($values);
    }
    
    public function rowCount(){
      return $this->exec->rowCount();
    }
    
    public function fetchObj(){
      return $this->exec->fetchObject();
    }
    
    public function fetchArr(){
      return $this->exec->fetch(PDO::FETCH_ASSOC);
    }
    
    
    
    public function teste(){
      try{
	 $get = $this->conn->prepare("SHOW TABLES");
	 $r=$get->execute();
	 if($r){
	  echo 'OK';
	 }else{
		  echo 'ERROR';
	 }
      }catch(Exception $e){
	die($e->getMessage());
      }
    }
    
  }
  
?>
