<?php
 require_once("../CONTROLLER/MotherController.php");
 require_once("../MODEL/Database.php");

class Router
{
    public function __construct()
    {

 $uri=$_SERVER["REQUEST_URI"];
 $uri = trim($uri,"/");
 // echo $uri;

 $lien=(explode("/",$uri));
 
//   var_dump ($lien);   
 $vvv=file_exists ("../CONTROLLER/".$lien[0]."Controller.php");
//  var_dump($vvv);
 if (isset($lien[0]) && $lien[0]) {
    // echo "controller existe";

 }else{
    //  echo "pas de controller";
     $lien[0]="Home";
   //   echo $lien[0];

 }

 if (file_exists ("../CONTROLLER/".ucfirst(strtolower($lien[0]))."Controller.php")){
      // echo "ok";
 }else{
    //  echo "KO";
 }

 //permet de verifier si l'action existe
 if (isset($lien[1]) && $lien[1]){
   //   echo "action existe";
     
     echo "\n";
     //require_once("../CONTROLLER/".ucfirst(strtolower($lien[0]))."Controller.php");
     $cont = ucfirst(strtolower($lien[0]));
   //  echo $cont;
   //   echo "\n";

     require "../CONTROLLER/".$cont."Controller.php";
   //   echo "arret";

    $controller=ucfirst(strtolower($lien[0]))."Controller";
    $currentcontroller= new $controller;
    $val=method_exists($currentcontroller,$lien[1]); 
    unset($lien[0]);
    $methode = $lien[1];
    unset($lien[1]);
    $link=$lien;
    
    if ($val){
         // echo "cette methode existe";
         call_user_func_array([$currentcontroller,$methode], $link);    //appeler la methode d'une classe dytnamiquement et le dernier paramètre c'est pour le paramètre de la fonction
    }else{
         // echo "cette methode n'existe pas";
         // echo "$lien[0]";
         // $lie = strtolower($lien[0]);
         // require "../VIEW/".$lie."html.php";
         // echo "stop";
    }
   //  echo "pape moussa";



 }
 else 
 {
   //  echo "pas de methode";
 }
 //explode permet de séparer notre URL    
 //    var_dump($_SERVER["REQUEST_URI"]); 
    }
}
