<?php ob_start(); ?>

<div class="container">

    <?php foreach($datas as $data) : ?>
        <div class="card col m-5" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?= $data['titre'] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $data['A_nom_prenom'] ?></h6>
                <p class="card-text"><?= $data['notice'] ?></p>
                <a href="#" class="card-link"><?= $data['prix'] ?> €</a>
                <a href="#" class="card-link"><?= $data['etat'] ?></a>
            </div>
        </div>
    <?php endforeach; ?>

</div>

<?php 
$content = ob_get_clean();
$titre = "Visualisation des données";
require "views/commons/template.php";