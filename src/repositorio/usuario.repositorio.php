<?php

class UsuarioRepositorio{

    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }


    public function formarObjeto($dados){

        return new Usuario($dados['id'], $dados['nome'], $dados['email'], $dados['senha']);
    }

    public function buscarTodos(): array{
        $sql = "SELECT * FROM usuario";
        $statement = $this->pdo->query($sql);
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        $todosOsDados = array_map(function($usuario){
            return $this->formarObjeto($usuario);
        },$dados);

        return $todosOsDados;
    }

    public function buscar(int $id){
        $sql = "SELECT * FROM usuario WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();
        $dados = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->formarObjeto($dados);
    }

    
    public function deletarUsuario(int $id){
        $sql = "DELETE FROM usuario WHERE id = ? ";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$id);
        $statement->execute();
    }

    public function inserirUsuario(Usuario $usuario){
        $sql = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $usuario->getNome());
        $statement->bindValue(2, $usuario->getEmail());
        $statement->bindValue(3, $usuario->getSenha());
        $statement->execute();
    }

    public function editarUsuario(Usuario $usuario){
        $sql = "UPDATE usuario SET nome = ?, email = ?, senha = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $usuario->getNome());
        $statement->bindValue(2, $usuario->getEmail());
        $statement->bindValue(3, $usuario->getSenha());
        $statement->bindValue(4, $usuario->getId());
        $statement->execute();
    }

}
?>