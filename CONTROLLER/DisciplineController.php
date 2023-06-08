<?php
require_once("../MODEL/NiveauModel.php");
require_once("../MODEL/ClasseModel.php");
require_once("../MODEL/DisciplineModel.php");


class DisciplineController extends MotherController{
    private $DisciplineModel;
     

    public function __construct()
    {
  
      $this->DisciplineModel = new DisciplineModel();

    }

    
    public function gestion()
    {
        $data = $this->DisciplineModel->getAllLevel(); 
        $disci =  $this->DisciplineModel->getAlldiscipline();
        require "../VIEW/".__FUNCTION__.".html.php";   
    }

    public function afficherClasse()
    {
        $data=json_decode(file_get_contents("php://input"),true);
        $id=$data["id_niveau"];
        $class = $this->DisciplineModel->getClassByNiveau($id);
        file_put_contents("../PUBLIC/FICHIER.json",json_encode($class));
    }
    public function afficherDiscipline()
    {
      $discipline =  $this->DisciplineModel->getAlldiscipline();
      file_put_contents("../PUBLIC/FICHIER.json",json_encode($discipline));
    }
    

    public function getDisciplineByClass($id)
    {
        $data = $this->DisciplineModel->getAlldisciplineByClass($id);
        file_put_contents("../PUBLIC/FICHIER.json",json_encode($data));
    }
    
    public function insertDiscipline()
    {
      $data = json_decode(file_get_contents("php://input"),true);
      $this->DisciplineModel->insertDiscipline($data["LIBELLE"],$data["id_gd"]);
      $id_disc= $this->DisciplineModel->getdisciplineById($data["LIBELLE"])[0]["id_disc"];
      $this->DisciplineModel->insertAssocTable($id_disc,$data["id_class"]);
      $class= $this->DisciplineModel->getAlldisciplineByClass($data["id_class"]);
      file_put_contents("../PUBLIC/FICHIER.json",json_encode($class));
    }
}
 
