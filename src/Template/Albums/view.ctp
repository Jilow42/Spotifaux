<?php // src/Template/Artists/view.ctp ?>

<h1><?= $album->title ?></h1>

<p>Par : <?= $this->Html->link($album->artist->pseudo, [
    'controller' => 'Artists',
    'action' => 'view',
    $album->artist_id]) ?></p>

<p> Date de Sortie :<?php
  if (!empty($album->releasedate)) {echo $album->releasedate->i18nFormat('dd/MM/yyyy');}
  else {echo "Non renseigner";} ?></p>

<p>Nombre de piste :<?php
  if (!empty($album->nbtracks)) {echo $album->nbtracks;}
  else {echo "Non renseigner";} ?>
</p>

<figure> <?php
  if (!empty($album->cover)) {}
  else {echo "Non renseigner";} ?>

</figure>

<p>Lien vers Spotify :<?php
  if (!empty($album->linkspotify)) {?>

    <iframe src="https://open.spotify.com/embed/album/<?= $album->linkspotify?>" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>"
    <?php }
  else {echo "Non renseigner";} ?>
</p>

<p> <?= $this->Html->link('Modifier la cover' , ['action' => 'editcover', $album->id] ) ?> </p>

<p> <?= $this->Html->link('Modifier les informations' , ['action' => 'edit', $album->id] ) ?> </p>

<p> <?= $this->Form->postLink('Supprimer l\'album' , ['action' => 'delete', $album->id] ) ?> </p>

<p> <?= $this->Html->link('Retour à la liste', ['action' => 'index']) ?> </p>

