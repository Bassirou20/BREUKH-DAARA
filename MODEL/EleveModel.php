<?php
require_once("/MODEL/Database.php"); 
class EleveModel {
   
    private $nom;
    private $prenom;
    private $sexe;
    private $date_de_naissance;
    private $numero;
    private $TYPE;

    private $db;

    public function connexion(){
        $this->db = new Database();
    }
  
    
    public function __construct($nom, $prenom, $sexe,$date_de_naissance,$numero,$type) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->sexe = $sexe;
        $this->date_de_naissance = $date_de_naissance;
        $this->numero = $numero;
        $this->TYPE = $type;
    }

    public function getAllStudents(){
        $connect=$this->db->getPDO();
        $query = "SELECT * FROM ELEVE";
        $result = $connect->query($query);
        $eleves = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $eleves[] = new EleveModel($row['nom'],$row['prenom'],$row['sexe'],$row['date_de_naissance'],$row['numero'],$row['type']);
        }
    }

}