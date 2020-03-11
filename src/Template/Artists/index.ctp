<?php
?>
<h1>Liste des artists :</h1>
<p> <?= $this->Html->link('Ajouter un artiste' , ['action' => 'new'] ) ?> </p>
<?php 
    if($listeArtists->count() == 0) {
        echo '<p>Il n\'y a pas d\'artistes dans notre base de données</p>';
    } else { ?>
    <ul>
        <?php foreach ($listeArtists as $liste) {?>
            <li>
                <span> <?= $this->Html->link($liste->pseudo, ['controller' => 'Artists', 'action' => 'view', $liste->id]); ?></span>
            </li>
        <?php }; ?>
    </ul>
<?php } ?>



