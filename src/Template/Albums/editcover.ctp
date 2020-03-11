<?php //src/Template/Albums/editcover.ctp ?>

<?= $this->Form->create($ec, ['enctype' => 'multipart/form-data']); ?>

<h1>Modification de la pochette de <?= $ec->title ?></h1>

    <?= $this->Form->control('cover', ['type' => 'file', 'label' => 'Affiche']); ?>

        <?php
        if (!empty($ec->cover)) { ?>

            <figure>
                <?= $this->Html->image('cover/'.$ec->cover, ['alt' => 'Pochette de : '.$ec->title]);?>
            </figure>
            
        <?php }else{ ?>
            <p>Image non renseigner</p>
        <?php } ?>
    <?= $this->Form->button('Modifier'); ?>
<?= $this->Form->end(); ?>

    
