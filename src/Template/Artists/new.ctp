<?php
//src/Template/Artists/new.ctp
?>
<?= $this->form->create($n);?>

<?= $this->form->control('pseudo');?>
<?= $this->form->control('description');?>
<?= $this->form->control('birthdate');?>

<?= $this->form->button('Ajouter');?>

<?= $this->form->end();?>