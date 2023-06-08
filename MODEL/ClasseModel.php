<?php

require_once("../MODEL/Database.php");

class ClasseModel{
    private $dbconnexion;

    public function __construct(){
        $this->dbconnexion = new Database();
    }

    public function getIdByName($idprim)
{
    $this->dbconnexion->getPDO();
    $query = "SELECT NOM, EFFECTIF
              FROM CLASSE
              JOIN NIVEAU ON NIVEAU.id_niveau = CLASSE.CLASSID
              JOIN GROUPENIVEAU ON GROUPENIVEAU.ID = NIVEAU.NIVEAU_ID
              WHERE ID = :NIVEAU_ID
              ORDER BY NOM ASC";
    $req = $this->dbconnexion->getPDO()->prepare($query);
    $req->bindParam(':NIVEAU_ID', $idprim);
    $req->execute();

    // Récupérer les résultats sous forme de tableau associatif
    $id_class = $req->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($id_class);
    return $id_class;
}
   

    
    


    public function getClassByNiveau($idNiveau)
    {
        $this->dbconnexion->getPDO();
        $query = "SELECT `NOM`,EFFECTIF FROM `CLASSE`
        JOIN `NIVEAU` ON NIVEAU.`id_niveau` = CLASSE.`CLASSID`
        WHERE CLASSE.`CLASSID` = $idNiveau
        ORDER BY `NOM` ASC";
         $req = $this->dbconnexion->getPDO()->prepare($query);
         $req->execute();
         return $req->fetchAll(PDO::FETCH_ASSOC);
         
    }


    public function getClassesByLevel($level)
  {
    $data = array();
      $query =" SELECT CLASSE.id_classe,  CLASSE.NOM FROM
      CLASSE INNER JOIN NIVEAU ON CLASSE.CLASSID = NIVEAU.id_niveau where NIVEAU.NIVEAU_ID =:level " ;
      $statement = $this->dbconnexion->getPDO()->prepare($query);
      $statement->bindParam(':level', $level);
    
      if ($statement->execute()) {
          while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
              $data[] = $row;
          }
      }
        return $data;

    }

    public function insertClasse($nom, $effectif, $id)
    {
        $this->dbconnexion->getPDO();
        $query = "INSERT INTO CLASSE (EFFECTIF, NOM, CLASSID) VALUES (:EFFECTIF, :NOM, :CLASSID)";
        $req = $this->dbconnexion->getPDO()->prepare($query);
        $req->bindParam(':NOM', $nom);
        $req->bindParam(':EFFECTIF', $effectif);
        $req->bindParam(':CLASSID', $id);
        $req->execute();
    }
}
    //  $REQUETE = "SELECT NOM FROM GROUPENIVEAU, NIVEAU, CLASSE WHERE NIVEAU_ID = 1 && ID_niveau = classe_id";



    