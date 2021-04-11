<?php ob_start(); ?>
    <table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">email</th>
            <th scope="col">tel</th>
            <th scope="col">Adresse</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($clients as $client) : ?>
            <tr>
                <th scope="row"><?= $client['id'] ?></th>
                <td><?= $client['nom_prenom'] ?></td>
                <td><?= $client['email'] ?></td>
                <td><?= $client['tel'] ?></td>
                <td><?= $client['adresse'] . ', ' . $client['code_postal'] . ' ' . $client['ville']?></td>
            </tr>
       <?php endforeach; ?>
    </tbody>
    </table>

<?php 
$content = ob_get_clean();
$titre = "Visualiser les clients";
require "views/commons/template.php";