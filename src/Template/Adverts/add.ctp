<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Advert $advert
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Adverts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adverts form large-9 medium-8 columns content">
    <?= $this->Form->create($advert) ?>
    <fieldset>
        <legend><?= __('Add Advert') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('advert_url');
            echo $this->Form->control('uploaddate');
            echo $this->Form->control('amount');
            echo $this->Form->control('startdate');
            echo $this->Form->control('enddate');
            echo $this->Form->control('status');
            echo $this->Form->control('aprovedby');
            echo $this->Form->control('adsize');
            echo $this->Form->control('adtype');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
