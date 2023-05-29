<?php
class ConexionPDO{
    private $host;
    private $dbname;
    private $usuario;
    private $contrasena;
    private $conexion;

    public function __construct($host,$dbname,$usuario,$contrasena){
        $this->host = $host;
        $this->dbname = $dbname;
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
    }

    public function conectar(){
        try{
            $opcion =array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            $this->conexion=new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->usuario, $this->contrasena,$opcion);
            if($this->conexion != null){
                echo "conexion exitosa";
            }else{
                echo "no se pudo conectar";
            }
        }
        catch(PDOException $e) {
            echo "ERROR DE CONEXION".$e->getMessage();
            die();
        }
    }
    public function getConnection(){
        return $this->conexion;
    }

    public function desconectar(){
        $this->conexion = null;
        echo "Base de datos desconectada";

    }
}
?>