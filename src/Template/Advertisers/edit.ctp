<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Advertiser $advertiser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $advertiser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $advertiser->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Advertisers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="advertisers form large-9 medium-8 columns content">
    <?= $this->Form->create($advertiser) ?>
    <fieldset>
        <legend><?= __('Edit Advertiser') ?></legend>
        <?php
            echo $this->Form->control('fname');
            echo $this->Form->control('lname');
            echo $this->Form->control('phone');
            echo $this->Form->control('createdon');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
