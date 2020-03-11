<?php // src/Template/Albums/edit.ctp ?>

<?= $this->Form->create($e) ?>
    <h1>Modifier les informations</h1>
    <?= $this->Form->control('title', ['label' => 'Le titre']) ?>
    <?= $this->Form->control('releasedate') ?>
    <?= $this->Form->control('nbtracks', ['label' => 'Le nombre de piste']) ?>
    <?= $this->Form->select('artist_id', $allArtists) ?>
    <?= $this->Form->control('linkspotify', ['label' => 'Lien vers le spotify']) ?>

    <?= $this->Form->button('Modifier') ?>
<?= $this->Form->end() ?>
