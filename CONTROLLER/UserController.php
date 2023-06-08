<?php
require_once("../MODEL/UserModel.php");
class UserController extends MotherController{
    private $userModel;
public function __construct(){
    $this->userModel= new UserModel();
}

    public function connect(){
        $telephone = $_POST["telephone"];
        $password = $_POST["motDePasse"];
        
        if ($this->userModel->connect($telephone,$password)) {
            header("Location:http://localhost:8000/Niveau/niveau");
        }else {
            echo "Non connect";
        }
    }
}