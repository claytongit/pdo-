<?php

class Connect{

    private $pdo;

    public function conn($host, $dbname, $user, $pass){

        try {
            $this->pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass);
        } catch (PDOExceptio $e) {
            echo 'Erro ao conectar com banco de dados'.$e->getMessage();
        }
    }


    public function register($user, $email){
        $sql = $this->pdo->prepare('SELECT user FROM usuarios WHERE user = ?');
        $sql->bindValue(1, $user);
        $sql->execute();

        if($sql->rowCount() > 0){
            $_SESSION['user_isset'] = true;
            header("Location: ../cadastro.php");
        }else{
            $sql = $this->pdo->prepare('INSERT INTO usuarios (user, email) VALUES (?, ?)');
            $sql->bindValue(1, $user);
            $sql->bindValue(2, $email);
            $sql->execute();

            $_SESSION['success'] = true;
            header("Location: ../index.php");
        }
    } 


    public function select(){
        $sql = $this->pdo->prepare('SELECT * FROM usuarios');
        $sql->execute();

        if($sql->rowCount() > 0){
            $cmd = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $cmd;
        }else{
            return [];
        }
    }

    public function update($id, $user, $email){
        $sql = $this->pdo->prepare('UPDATE usuarios SET user = ?, email = ?');

        $sql->bindValue(1, $user);
        $sql->bindValue(2, $email);
        $sql->bindValue(3, $id);
        $sql->execute();
    }

    public function delete($id){
        $sql = $this->pdo->prepare('DELETE FROM usuarios WHERE id = ?');
        $sql->bindValue(1, $id);
        $sql->execute();
    }
}