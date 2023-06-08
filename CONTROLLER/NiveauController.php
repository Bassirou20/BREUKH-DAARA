<?php
require_once("../MODEL/NiveauModel.php");
class NiveauController extends MotherController{

    private $NiveauModel;

    public function __construct()
    {
        $this->NiveauModel = new NiveauModel();
    }


    public function niveau(){
        
        $level=$this->NiveauModel->getAllLevel();
        // var_dump(__FUNCTION__);
        require "../VIEW/".__FUNCTION__.".html.php";
        //$this->render(__FUNCTION__);
    }

    


}