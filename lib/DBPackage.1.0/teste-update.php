<?php
function __autoload($class){
    include $class.'.class.php';
  }
  
  //setando drive
  Drive::set('mysql');
  //abrindo conexão com o banco de dados
  $conn = Drive::getConnection('localhost', 'db_package', 'root', '');

  	$up = new SqlUpdate;
	$up->setTable('usuario');
	$up->setRowData('nome', 'Gleysson Rocha');
	$up->setRowData('email', 'gleyssongaspar@gmail.com');

	$up->addCondition('id_usuario', '=', 2);
	

	echo $up->release($conn);

	echo $up->getInstruction();

	

//var_dump($del);




  

	

