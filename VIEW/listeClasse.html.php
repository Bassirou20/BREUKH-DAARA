<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"> -->
<form class="row gy-2 gx-3 align-items-center"  action="http://localhost:8000/Classe/addClasse/" method="POST">
  <div class="col-auto">
    <label class="visually-hidden" for="autoSizingInput">CLASSE:</label>
    <input type="text" class="form-control" id="autoSizingInput" placeholder="ajouter une classe" name="classe">
  </div>
  <div class="col-auto">
    <label class="visually-hidden" for="autoSizingInput">EFFECTIF:</label>
    <input type="text" class="form-control" id="autoSizingInput" placeholder="ajouter effectif" name="effectif">
  </div>
 
  <div class="col-auto">
    <button type="submit" class="btn btn-primary">Ajouter</button>
  </div>
</form>


<div>
    <table>
        <thead>
            <tr>
                <th>NOM</th>
                <th>EFFECTIFS</th>
                <th>-</th>
                <th>-</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($classes as $key) : ?>
                <tr>
                    <td><?php echo $key['NOM']; ?></td>
                    <td><?php echo $key['EFFECTIF']; ?></td>
                    <td>-</td>
                    <td>-</td>
                    <td><button>View</button></td>
                </tr>
                <!-- <tr>
                    <td>2</td>
                    <td><img src=https://drive.google.com/uc?export=view&id=1KV8Ob2wXIcobIvayGGDB1qUpQn_iZKIp /></td>
                    <td>Anjali</td>
                    <td>-</td>
                    <td>-</td>
                    <td><button>View</button></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><img src=https://drive.google.com/uc?export=view&id=1ock7haLmYaAbHe8yn9H8ZGgkaGY9lcB0 /></td>
                    <td>Vejata Gupta</td>
                    <td>-</td>
                    <td>-</td>
                    <td><button>View</button></td>
                </tr> -->


            <?php endforeach ?>
        </tbody>
    </table>
</div>

