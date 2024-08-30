<?php

require_once "src/modelo/cls.usuario.php";
require_once "src/repositorio/conexao-bd.php";
require_once "src/repositorio/usuario.repositorio.php";

$usuariosRepositorio = new UsuarioRepositorio($pdo);
$usuarios = $usuariosRepositorio->buscarTodos();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/style.cadastro.css">
</head>
<body>
    
</section>
  <h1>Lista de Usuarios</h1>

  <section class="impresso">
    <table>
      <thead>
        <tr>
          <th>Id</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Senha</th>
          <th colspan="2">Ação</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($usuarios as $usuario):  ?>
      <tr>
        <td><?= $usuario->getId()  ?></td>
        <td><?= $usuario->getNome()  ?></td>
        <td><?= $usuario->getEmail()  ?></td>
        <td><?= $usuario->getSenha()  ?></td>

        <td><a class="impresso__botao__editar" href="editar.php?id=<?= $usuario->getId() ?>">Editar</a></td>

        <td>
        
        <form action="excluir.php" method="post">
              <input type="hidden" name="id" value="<?= $usuario->getId() ?>">
            <input type="submit" class="impresso__botao__excluir" value="Excluir">
          </form>
        </td>
        
      </tr>
      <?php endforeach;  ?>
 
      </tbody>
    </table>
  <a class="impresso__botao__cadastrar" href="formulario.php">Cadastrar usuario</a>
  <form action="gerador-pdf.php" method="post">
    <input type="submit" class="impresso__botao__baixar__relatorio" value="Baixar Relatório"/>
  </form>
  </section>

</body>
</html>