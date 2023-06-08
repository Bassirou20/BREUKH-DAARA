<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">


  <title>Document</title>
</head>
<body>
  


<h1>Gestion des Disciplines</h1>

<br>

<div class="row g-2" >
  
  
  <div class="col-md-5">
    <label for="inputState" class="form-label ">ELEMENTAIRE</label>
    <select id="inputState" class="form-select id_niveau" >
    <option selected>choisir</option>

      <?php foreach ($data as $d): ?>
                            <option value="<?= $d['id_niveau'] ?>"><?= $d['libelle'] ?></option>
           <?php endforeach; ?>
    </select>
  </div>
  <div class="col-md-5">
    <label for="inputState" class="form-label ">Groupe Disciplines</label>
    <select id="inputState" class="form-select groupediscipline">
      <option selected>choisir</option>
       <?php foreach ($disci as $d): ?>
                            <option value="<?= $d['id_gd'] ?>"><?= $d['nom_gd'] ?></option>
           <?php endforeach; ?> 
    </select>
  </div>
  <div class="col-md-5">
    <label for="inputState" class="form-label ">CLASSE</label>
    <select id="inputState" class="form-select classinput">
      <option selected class="txt_red">choisir</option>
     
    </select>
  </div>
 
  <div class="col-md-5">
    <label for="inputPassword4" class="form-label  class">DISCIPLINE</label>
    <input type="text" class="form-control new_discipline" id="inputPassword4" placeholder="Discipline">
  </div>
 
 
  <div class="col-12">
    <button type="button" class="btn btn-primary" id="boutonOk">ok</button>
  </div>
       </div>

<br>
<br>
<h3>Les disciplines de la classe de <code class="span"></code></h3>
<br>
<br>
<div id="discipline-container">
</div>
<button type="submit">Mettre à jour</button>

<script src="http://localhost:8000/js/app.js"></script>

</body>
</html>