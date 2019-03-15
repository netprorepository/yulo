<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\State $state
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List States'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Agents'), ['controller' => 'Agents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Agent'), ['controller' => 'Agents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Yulo Cities'), ['controller' => 'YuloCities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Yulo City'), ['controller' => 'YuloCities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="states form large-9 medium-8 columns content">
    <?= $this->Form->create($state) ?>
    <fieldset>
        <legend><?= __('Add State') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('country_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>