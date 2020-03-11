<?php // src/Template/Artists/edit.ctp ?>

<?= $this->Form->create($e) ?>
    <h1>Modifier les informations</h1>
    <?= $this->Form->control('pseudo', ['label' => 'Le Pseudo']) ?>
    <?= $this->Form->control('description', ['label' => 'La description']) ?>
    <?= $this->Form->control('birthdate', ['label' => 'La date de naissance']) ?>
    <?= $this->Form->button('Modifier') ?>
<?= $this->Form->end() ?>
