 <?php
// var_dump($_GET);
// $TAB=[1,2,3,4];
//  array_shift($TAB);
// // echo "bzchgdzz"; 
// var_dump($TAB);
?>


<!DOCTYPE html>

<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>BREUKH</title>
   <?php
   $url = explode('/', $_SERVER["REQUEST_URI"]);
   // echo '<pre>';
   // print_r($url);
   // echo '<pre>';
   if ($url[1] == "Niveau" && $url[2] == "niveau") {
      echo "<link rel='stylesheet' href='http://localhost:8000/css/niveau.css'";
   } elseif ($url[1] == "Classe" && $url[2] == "listeClasse" || $url[2] =="addClasse") {
      echo "<link rel='stylesheet' href='http://localhost:8000/css/niveau.css'";
   }
   ?>

</head>

<body>

   <?php
    require_once("../ROUTER/Router.php");
    require_once"../VIEW/include.html.php";
   $rout = new Router();
   // require"../MODEL/ClasseModel.php";
   //    $classe=new ClasseModel();
   //    $classe->insertClasse();
   //    require "../MODEL/NiveauModel.php";
   //    $model = new NiveauModel();
   //    echo "eee";  
   //    var_dump($model->getAllLevel());

  
   ?>
   
  
</body>

</html> 