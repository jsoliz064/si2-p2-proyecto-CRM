<?php
include 'conexion.php';
$email=$_POST['usuario'];
$password=$_POST['password'];

/* $password="12345678";
$email="jsoliz064@gmail.com"; */

$sentencia=$conexion->prepare("SELECT * FROM users WHERE email=?");
$sentencia->bind_param('s',$email);
$sentencia->execute();

$resultado = $sentencia->get_result();
$fila=$resultado->fetch_assoc();

if ($fila && password_verify($password,$fila['password'])){
         echo json_encode($fila['id'],JSON_UNESCAPED_UNICODE);     
}
$sentencia->close();
$conexion->close();
?>