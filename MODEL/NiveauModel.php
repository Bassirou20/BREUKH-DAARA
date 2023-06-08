<?php
require_once("../MODEL/Database.php");

class NiveauModel{
    
    private $connexion;

    public function __construct(){
        $this->connexion = new Database();
    }

    public function getAllLevel()
    {
            $this->connexion->getPDO();
            $sql = "SELECT * FROM NIVEAU";
            try 
            {

                $result = $this->connexion->getPDO()->query($sql);
                $result=$result->fetchAll(PDO::FETCH_ASSOC);
                // echo "connexion etablie";
                // var_dump($result);
                return $result;
            }
            catch (PDOException $e)
            {
                echo "erreur".$e->getMessage();
            }
    }

    public function getClassByNiveau($idNiveau)
    {
        $this->connexion->getPDO();
        $query = "SELECT `NOM`,EFFECTIF FROM `CLASSE`
        JOIN `NIVEAU` ON NIVEAU.`id_niveau` = CLASSE.`CLASSID`
        WHERE CLASSE.`CLASSID` = $idNiveau
        ORDER BY `NOM` ASC";
         $req = $this->connexion->getPDO()->prepare($query);
         $req->execute();
         return $req->fetchAll(PDO::FETCH_ASSOC);
         
    }
}