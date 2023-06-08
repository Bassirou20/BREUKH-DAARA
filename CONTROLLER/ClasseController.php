<?php
session_start();
require"../MODEL/ClasseModel.php";
class ClasseController extends MotherController
{
    private $ClasseModel;
    public function __construct(){
        $this->ClasseModel = new ClasseModel();
    }


    public function listeClasse($id)
    {
      $_SESSION["currentclass"]=$id;
      $classes= $this->ClasseModel->getClassByNiveau($id);

      require "../VIEW/".__FUNCTION__.".html.php";
    }

    public function addClasse(){
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $nom = $_POST['classe'];
         $effectif = $_POST['effectif'];
         $id=$_SESSION["currentclass"];
          // echo"";
          $this->ClasseModel->insertClasse($nom, $effectif,$id);
           $this->listeClasse($id);
        
          // var_dump($id);
         
        //  require "../VIEW/listeClasse.html.php";
         
        //  header("Location: index.php?action=addClasse");
     }   
   }

   
   
}