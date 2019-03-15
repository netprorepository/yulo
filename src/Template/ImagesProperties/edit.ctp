<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ImagesProperty $imagesProperty
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $imagesProperty->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $imagesProperty->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Images Properties'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="imagesProperties form large-9 medium-8 columns content">
    <?= $this->Form->create($imagesProperty) ?>
    <fieldset>
        <legend><?= __('Edit Images Property') ?></legend>
        <?php
            echo $this->Form->control('image_id', ['options' => $images]);
            echo $this->Form->control('property_id', ['options' => $properties]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
