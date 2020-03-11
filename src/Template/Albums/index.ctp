<?php //src/Template/Albums/index.ctp ?>

<h1>Liste des Albums :</h1>
<p> <?= $this->Html->link('Ajouter un Album' , ['action' => 'new'] ) ?> </p>
<?php 
    if($listeAlbums->count() == 0) {
        echo '<p>Il n\'y a pas d\'albums dans notre base de données</p>';
    } else { ?>
    <ul>
        <?php foreach ($listeAlbums as $liste) {?>
            <li>
                <span> <?= $this->Html->link($liste->title, ['controller' => 'Albums', 'action' => 'view', $liste->id]); ?></span>
            </li>
        <?php }; ?>
    </ul>
<?php } ?>



