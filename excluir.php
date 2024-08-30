<?php
require_once "src/modelo/cls.usuario.php";
require_once "src/repositorio/conexao-bd.php";
require_once "src/repositorio/usuario.repositorio.php";

$usuarioRepositorio = new UsuarioRepositorio($pdo);
$usuarioRepositorio->deletarUsuario($_POST['id']);

header("location: admin.php");

?>