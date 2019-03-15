<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <link rel="icon" href="/img/logo.png" type="image/x-icon">

    <?= $this->Html->css(['main','all-themes','login']) ?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

<?php 
echo $this->Html->meta('logo.png','/img/logo.png',['type' => 'icon', 'rel' => 'shortcut icon']); ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
   
</head>
<body>
    <div id="container">
        <div id="header">
            <h1><?= __('Error') ?></h1>
        </div>
        <div id="content">
            <?= $this->Flash->render() ?>

            <?= $this->fetch('content') ?>
        </div>
        <div id="footer">
            <?= $this->Html->link(__('Back'), 'javascript:history.back()') ?>
        </div>
    </div>
    
    
    <?= $this->Html->script(['libscripts.bundle','vendorscripts.bundle','mainscripts.bundle']) ?>
     <?= $this->fetch('script') ?>
</body>
</html>
