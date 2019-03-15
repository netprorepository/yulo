<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categorysubtype $categorysubtype
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $categorysubtype->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $categorysubtype->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Categorysubtypes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="categorysubtypes form large-9 medium-8 columns content">
    <?= $this->Form->create($categorysubtype) ?>
    <fieldset>
        <legend><?= __('Edit Categorysubtype') ?></legend>
        <?php
            echo $this->Form->control('categorysubtypename');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
