<?php
function __autoload($class){
    include $class.'.class.php';
  }
  
  //setando drive
  Drive::set('mysql');
  //abrindo conexão com o banco de dados
  $conn = Drive::getConnection('localhost', 'db_package', 'root', '');

  
	$del = new SqlDelete;
	$del->setTable('usuario');
	$del->addCondition('email', 'LIKE', '%edigleyssonsilva@gmail.com%');
	$del->addCondition('id_usuario', '=', 10);

	$del->OR(1);
	$del->limit(10);

	$del->release($conn, FALSE);

	echo $del->getInstruction();

//var_dump($del);




  

	

