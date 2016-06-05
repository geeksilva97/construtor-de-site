<?php
  
  class Connection{
    
    private $conn;
    private $isConected;
    private $query;
    
    public function __construct($host, $database, $user, $password, $drive,  $port){
#    	var_dump(func_get_args());
		
		try{
			$this->conn = $this->getConnByDRIVE($host, $database, $user, $password, $drive);
			$this->isConected = TRUE;
		}catch(PDOException $e){
			die($e->getMessage());
		}
		     
    }

	private function getConnByDRIVE($host, $database, $user, $pass, $drive){
		$port = '';
		$pdo;
		switch($drive){
			case 'pgsql':
				$port = $port ? $port : '5432';
				$pdo = new PDO('pgsql:dbname='.$database.'; user='.$user.'; password='.$pass.'; host='.$host.'');
			break;

			case 'mysql':
				$port = $port ? $port : '3306';
				$pdo = new PDO('mysql:host='.$host.'; dbname='.$database.';', $user, $pass);
			break;
			case 'sqlite':
				$pdo = new PDO('sqlite:'.$database.'');
			break;
			case 'ibase':
				$port = $port ? $port : '5432';
				$pdo = new PDO('firebird:dbname='.$database.'', $user, $pass);
			break;
			case 'oci8':
				$port = $port ? $port : '5432';
				$pdo = new PDO('oci:dbname='.$database.'', $user, $pass);
			break;
			case 'mssql':
				$port = $port ? $port : '5432';
				$pdo = new PDO('mssql:host='.$host.',1433; dbname='.$database.'', $user, $pass);
			break;
			default:
				$pdo ='teste';
			
			if($pdo){
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}

				
		}

		return $pdo;
	}
    
    public function prepareStatement($query){
      if($this->isConected){
	$this->query = $query;
	
	return new Statement($this->conn, $query);
	
      }else{
	throw new Exception('The connection are not begined');
      }
    }
    
    public function close(){
      if($this->isConected){
	$this->isConected=FALSE;
	unset($this->conn);
      }
    }
    
  }
  
  
?>
