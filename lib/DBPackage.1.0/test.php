<?php
  
  function __autoload($class){
    include $class.'.class.php';
  }
  
  //setando drive
  Drive::set('mysql');
  //abrindo conexão com o banco de dados
  $conn = Drive::getConnection('localhost', 'db_package', 'root', '');

  
   $add = new SqlInsert;
   $add->setTable(new Table('usuario', 'user'));
   $add->setRowData('id_usuario', 0);
   $add->setRowData('nome', 'Eduardo Mariano');
   $add->setRowData('email', 'eduardomarianobarros@gmail.com');
   $add->release($conn, FALSE);

	echo $add->getInstruction();
	

