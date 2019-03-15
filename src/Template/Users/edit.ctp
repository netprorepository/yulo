<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Agents'), ['controller' => 'Agents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Agent'), ['controller' => 'Agents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Yulo Transactions'), ['controller' => 'YuloTransactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Yulo Transaction'), ['controller' => 'YuloTransactions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('createdon');
            echo $this->Form->control('verificationstatus');
            echo $this->Form->control('verificationkey');
            echo $this->Form->control('accounttype');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>