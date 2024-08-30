<?php

require_once "src/modelo/cls.usuario.php";
require_once "src/repositorio/conexao-bd.php";
require_once "src/repositorio/usuario.repositorio.php";

$usuariosRepositorio = new UsuarioRepositorio($pdo);
$usuarios = $usuariosRepositorio->buscarTodos();
?>

<style>
    table{
        width: 90%;
        margin: auto 0;
    }
    table, th, td{
        border: 1px solid #000;
    }

    table th{
        padding: 11px 0 11px;
        font-weight: bold;
        font-size: 18px;
        text-align: left;
        padding: 8px;
    }

    table tr{
        border: 1px solid #000;
    }

    table td{
        font-size: 18px;
        padding: 8px;
    }
    .container-admin-banner h1{
        margin-top: 40px;
        font-size: 30px;
    }
</style>


<table>
      <thead>
        <tr>
          <th>Id</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Senha</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($usuarios as $usuario):  ?>
      <tr>
        <td><?= $usuario->getId()  ?></td>
        <td><?= $usuario->getNome()  ?></td>
        <td><?= $usuario->getEmail()  ?></td>
        <td><?= $usuario->getSenha()  ?></td>
        
        
      </tr>
      <?php endforeach;  ?>
 
      </tbody>
    </table>

