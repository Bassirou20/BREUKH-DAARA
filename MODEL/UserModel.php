<?php
require_once ("Database.php") ;

class UserModel{

    private $user;
    private $user_id;
    private $user_name;
    private $user_password;

    private $dbconnexion;

    public function __construct(){
        $this->dbconnexion = new Database();
    }
    

    public function getAllUsers(){
        $this->dbconnexion->getPDO();
        $sql = "SELECT * FROM USERS";
        $result = $this->dbconnexion->getPDO()->query($sql);
        return $result;
    }

    public function getUser($id){
        $sql = "SELECT * FROM USERS WHERE id = :id";
        $result = $this->dbconnexion->getPDO()->prepare($sql);
        $result->bindValue(':id', $id, PDO::PARAM_INT);
        $result->execute();
    }

    public function connect($login,$password){
        $sql = "SELECT * FROM USERS WHERE telephone = :telephone AND password = :password";
        $result = $this->dbconnexion->getPDO()->prepare($sql);
        $result->bindValue(':telephone', $login, PDO::PARAM_STR);
        $result->bindValue(':password', $password, PDO::PARAM_STR);
        $result->execute();
        $user= $result->fetch();
        if ($user) {
            return true;
        }
        return false;
    }
    

    
}


?>