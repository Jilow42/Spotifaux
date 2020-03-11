<?php
//src/Template/Atists/veiw.ctp
?>
<h1><?=$artist->pseudo?></h1>

<p><?=$this->Html->link('Retour sur la liste', ['action' => 'index']);?></p>

<h2>Ses Infos</h2>
<?php if(!empty($artist->description)){?>
    <p>Description : <?= $artist->description ?></p>
<?php } ?>

<?php if(!empty($artist->birthdate)){?>
    <p>Date de naissance : <?= $artist->birthdate->i18nFormat('dd/MM/yyyy') ?></p>
<?php } ?>

<p> <?= $this->Html->link('Modifier les informations' , ['action' => 'edit', $artist->id] ) ?> </p>

<h3>Infos base</h3>
<?php if(!empty($artist->created)){?>
    <p>Créé le : <?= $artist->created->i18nFormat('dd/MM/yyyy à HH:mm:ss') ?></p>
<?php } ?>

<?php if(!empty($artist->modified)){?>
    <p>Créé le : <?= $artist->modified->i18nFormat('dd/MM/yyyy à HH:mm:ss') ?></p>
<?php } ?>

<p>
<?= $this->Form->postLink('Supprimer',['action' => 'delete', $artist->id] , ['confirm' => 'Êtes-vous sur de voulir supprimer cette citation ?']);?>
</p>

<h2>Ses Albums</h2>

<?php
if (count($artist->albums) == 0) {
    echo '<p>Cet artiste n\'a aucun album actuellement</p>';
}else {
    echo '<ul>';
        foreach ($artist->albums as $value){
            echo '<li>'.
            $this->Html->link(
                $value->title,
                ['controller' => 'Albums','action' =>'view', $value->id ]
            ).
            '</li>';
        }
        echo '</ul>';
}?>