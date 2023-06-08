



<div>
    <table>
        <thead>
            <tr>
                <th>photo</th>
                <th>Nom</th>
                <th>-</th>
                <th>-</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($level as $key) : ?>
                <tr>
                    <td><img src=https://fac.img.pmdstatic.net/fit/https.3A.2F.2Fi.2Epmdstatic.2Enet.2Ffac.2F2022.2F05.2F10.2F74563fab-b60c-43f8-9e18-720d56f84329.2Ejpeg/970x485/quality/80/crop-from/center/inscription-a-l-ecole-elementaire-quelles-sont-les-demarches-a-suivre-le-guide-pratique.jpeg /></td>
                    <td><?php echo $key['libelle']; ?></td>
                    <td>-</td>
                    <td>-</td>
                    <!-- <td><a href="http://localhost:8000/Classe/classprim"><button>View</button></a></td> -->
                    <td>
                        <a href="http://localhost:8000/Classe/listeClasse/<?php echo $key['id_niveau'] ?>">view</a>
                    </td>
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