<?php //src/Template/Albums/new.ctp ?>

<?= $this->Form->create($n);?>
<?= $this->Form->control('title', ['label' => 'Le titre']) ?>
<?= $this->Form->control('releasedate') ?>
<?= $this->Form->control('nbtracks', ['label' => 'Le nombre de piste']) ?>
<?= $this->Form->select('artist_id', $allArtists) ?>
<?= $this->Form->control('linkspotify', ['label' => 'Lien vers le spotify']) ?>


<?= $this->Form->button('Ajouter');?>

<?= $this->Form->end();?>