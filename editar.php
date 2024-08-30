<?php
require_once "src/modelo/cls.usuario.php";
require_once "src/repositorio/conexao-bd.php";
require_once "src/repositorio/usuario.repositorio.php";

$usuarioRepositorio = new UsuarioRepositorio($pdo);
$usuario = $usuarioRepositorio->buscar($_GET['id']);


if(isset($_POST['editar'])){

    $usuario = new Usuario ($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['senha']);

    $usuarioRepositorio->editarUsuario($usuario);
    header("location: admin.php");

    }else{
        $usuario = $usuarioRepositorio->buscar($_GET['id']);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <h1>Redefinir Cadastro</h1>
    <form class="formulario" action="formulario.php" method="post" >

    <nav class ="formulario__atras">

        <label for="name">Nome Completo</label>
        <input type="text" name="name" value="<?= $usuario->getNome() ?>"><br>

        <label for="gmail">Email</label>
        <input  type="email" name="gmail" value="<?= $usuario->getEmail() ?>"><br>

        <label for="password">Senha</label>
        <input type="password" name="password" value="<?= $usuario->getSenha() ?>">

        <br><input class="formulario__botao__enviar" type="submit" value="Cadastrar" href="admin.php">
    </nav>

    </form>
    
</body>
</html>

