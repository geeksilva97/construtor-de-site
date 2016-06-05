<?php
function __autoload($class){
    include $class.'.class.php';
  }
  
  //setando drive
  Drive::set('mysql');
  //abrindo conexão com o banco de dados
  $conn = Drive::getConnection('localhost', 'db_package', 'root', '');

  	$get = new SqlSelect;
	$get->setTable('usuario');
	//$get->setFields('nome', 'email');
	$get->addCondition('id_usuario', '=', 2);

	$get->innerJoin(new Table('cidade', 'city'), array('id_cidade', 'id_cidade_usuario'));
	

	$get->release($conn);

	echo $get->getInstruction();

	

//var_dump($del);




  

	

