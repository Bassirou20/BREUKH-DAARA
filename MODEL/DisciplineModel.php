<?php
require_once("../MODEL/Database.php");



class DisciplineModel{

    private $dbconnexion;

    public function __construct(){
        $this->dbconnexion = new Database();
    }

    public function getAlldiscipline()
    {
       $sql="SELECT * FROM Groupe_Discipline";
       $result = $this->dbconnexion->getPDO()->prepare($sql);
       $result->execute();
       return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getClassByNiveau($idNiveau)
    {
        $this->dbconnexion->getPDO();
        $query = "SELECT * FROM `CLASSE`
        JOIN `NIVEAU` ON NIVEAU.`id_niveau` = CLASSE.`CLASSID`
        WHERE CLASSE.`CLASSID` = $idNiveau
        ORDER BY `NOM` ASC";
         $req = $this->dbconnexion->getPDO()->prepare($query);
         $req->execute();
         return $req->fetchAll(PDO::FETCH_ASSOC);
         
    }
    public function getAllLevel()
    {
            $this->dbconnexion->getPDO();
            $sql = "SELECT * FROM NIVEAU";
            try 
            {

                $result = $this->dbconnexion->getPDO()->query($sql);
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
    public function getAlldisciplineByClass($id)
    {
       $sql="SELECT * FROM CLASSDISCIP ,CLASSE,Discipline WHERE CLASSDISCIP.CLASSE_ID = CLASSE.id_classe AND Discipline.id_disc= CLASSDISCIP.DISC_ID AND CLASSDISCIP.CLASSE_ID=:id";
       $result = $this->dbconnexion->getPDO()->prepare($sql);
       $result->bindParam(':id',$id);
       $result->execute();
       return $result->fetchAll(PDO::FETCH_ASSOC);
    }


    // public function insertClassAssoc()
    // {
    //     $query="INSERT INTO `CLASSDISCIP` (id_classdisc, DISC_ID, CLASSE_ID, etat) VALUES (NULL, :DISC_ID, :CLASSE_ID, '')";
    // }


    public function insertDiscipline($libelle,  $id_gdis)
    {
        $requete = "INSERT INTO Discipline (id_disc, nom_disc, id_gd) VALUES (NULL, :nom_disc,:id_gd)";
        $requete = $this->dbconnexion->getPDO()->prepare($requete);
        $requete->bindParam(":nom_disc", $libelle);
        $requete->bindParam(":id_gd", $id_gdis);
        $requete->execute();
    }
     public function insertAssocTable($id_discipline, $id_classe)
    {
        $requete = "INSERT INTO `CLASSDISCIP` (id_classdisc, DISC_ID, CLASSE_ID, etat) VALUES (NULL, :DISC_ID, :CLASSE_ID, 1);";
        $requete = $this->dbconnexion->getPDO()->prepare($requete);
        $requete->bindParam(":CLASSE_ID", $id_classe);
        $requete->bindParam(":DISC_ID", $id_discipline);
        $requete->execute();
    }

    public function getdisciplineById($nom)
    {
        $query="SELECT id_disc FROM Discipline WHERE nom_disc=:nom";
        $requete = $this->dbconnexion->getPDO()->prepare($query);
        $requete->bindParam(":nom", $nom);
        $requete->execute();
        return $requete->fetchAll();
    }
    // public function getDisciplineByLevel()
    // {
    //     $this->dbconnexion->getPDO();
    //     $query=""
    // }
}
?>