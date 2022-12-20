<?php
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMySql($pdo);

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');


if($id && $name && $email){
  $usuario = new Usuario();
  $usuario->setId($id);
  $usuario->setNome($name);
  $usuario->setEmail($email);

  $usuarioDao->update($usuario);

  header('Location: index.php');
  exit;
  
}else{
  header("Location: editar.php?=".$id);
  exit;
}