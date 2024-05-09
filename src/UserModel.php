<?php
include_once("conexion.php");
class UserModel 
{
    private $link;
    public function __construct($link) {
        $this->link = $link;
    }
    public static function getInstance($link){
        return new UserModel($link);
    }
    public function getUser($id){
        return (consultas($this->link, "SELECT * FROM usuarios where id=".mysqli_real_escape_string($this->link, $id)))->fetch_object();
    }
    public function getUserByEmail($email){
        $result = (consultas($this->link, "SELECT * FROM usuarios where name='".mysqli_real_escape_string($this->link, $email)."'"));
        if($result->num_rows == 0){
            return null;
        }
        return $result->fetch_object();
    }
    public function addUser($fecha, $hora, $usuario, $descripti){
        $fecha = mysqli_real_escape_string($this->link, $fecha);
        $hora = mysqli_real_escape_string($this->link, $hora);
        $usuario = mysqli_real_escape_string($this->link, $usuario);
        $descripti = mysqli_real_escape_string($this->link, $descripti);
        (consultas($this->link, "insert into usuarios(date, hour, name, description) values('$fecha', '$hora','$usuario', '$descripti')"));
        return $this->link->insert_id;
    }
}
