<?php
require_once "src/modelo/cls.usuario.php";
require_once "src/repositorio/conexao-bd.php";
require_once "src/repositorio/usuario.repositorio.php";

$usuariosRepositorio = new UsuarioRepositorio($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados do formulário
    $nome = $_POST['name'];
    $email = $_POST['gmail'];
    $senha = $_POST['password'];

    $usuario = new Usuario(0, $nome, $email, $senha); 
// O ID é 0 porque será auto-incrementado no banco de dados, e estamos criando um novo objeto (nova instacia) do tipo usuario

// Insere o usuário no banco de dados

    $usuariosRepositorio->inserirUsuario($usuario);
        
        header('Location: admin.php');
        exit;
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
    <h1>Cadastro</h1>
    <form class="formulario" action="formulario.php" method="post" >

    <nav class ="formulario__atras">

        <label for="name">Nome Completo</label>
        <input type="text" name="name" placeholder="Dgite seu Nome Completo..."><br>

        <label for="gmail">Email</label>
        <input  type="email" name="gmail" placeholder="Digite seu Email..."><br>

        <label for="password">Senha</label>
        <input type="password" name="password" placeholder="Digite sua Senha...">

        <br><input class="formulario__botao__enviar" type="submit" value="Cadastrar" href="admin.php">
    </nav>

    </form>
    
</body>
</html>