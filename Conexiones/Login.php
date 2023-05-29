<?php
session_start();
if($_SESSION['usuario'] === null){
    header('Location: index.php');
}
class  Login {
    public $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function login($usuario, $password) {
        try {
            $query = "SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password";
            $pdo = $this->conexion->getConnection();
            $statement = $pdo->prepare($query);
            $statement->bindValue(':usuario', $usuario);
            $statement->bindValue(':password', $password);
            $statement->execute();

            if($statement->rowCount() == 1) {
                $_SESSION['usuario'] = $usuario;
                return true;

            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error en la consulta: ". $e->getMessage();
            return false;
        }
        
    }
}
?>