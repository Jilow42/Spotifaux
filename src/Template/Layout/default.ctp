<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
       SpotiLike :
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('reset.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('summernote.min.css') ?>
    <?= $this->Html->css('main.css') ?>
    
    <?= $this->Html->script('jquery-3.4.1.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('summernote.min.js') ?>

    <script>
        $(function(){
            $('textarea').summernote();
        });
    </script>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

    <header>
        <h1>
            <?= $this->Html->link('Spotilike' , ['controller' => 'Artists' , 'action' => 'index' ]); ?>
        </h1>

        <nav>
            <?= $this->Html->link('Les Artistes' , 
                ['controller' => 'Artists' , 'action' => 'index'],
                ['class' => ($this->templatePath == 'Artists' && ($this->template == 'index' || $this->template == 'view')) ? 'active' : '']
            ); ?>
            <?= $this->Html->link('Ajouter un artiste' , 
                ['controller' => 'Artists' , 'action' => 'new'],
                ['class' => ($this->templatePath == 'Artists' && $this->template == 'new') ? 'active' : ''] 
            ); ?>
            <?= $this->Html->link('Les Albums' , 
                ['controller' => 'Albums' , 'action' => 'index'],
                ['class' => ($this->templatePath == 'Albums' && ($this->template == 'index' || $this->template == 'view')) ? 'active' : '']
            ); ?>
            <?= $this->Html->link('Ajouter un album' , 
                ['controller' => 'albums' , 'action' => 'new'],
                ['class' => ($this->templatePath == 'Albums' && $this->template == 'new') ? 'active' : '']
            ); ?>
        </nav>
    </header>

    <main>
        <div class="messages">
            <?= $this->Flash->render() ?>
        </div>
        <?= $this->fetch('content') ?>
    </main>

</body>
</html>
