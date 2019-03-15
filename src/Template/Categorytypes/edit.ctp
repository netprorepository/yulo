<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categorytype $categorytype
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $categorytype->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $categorytype->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Categorytypes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categorytypes form large-9 medium-8 columns content">
    <?= $this->Form->create($categorytype) ?>
    <fieldset>
        <legend><?= __('Edit Categorytype') ?></legend>
        <?php
            echo $this->Form->control('category_id', ['options' => $categories]);
            echo $this->Form->control('categorytypename');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
