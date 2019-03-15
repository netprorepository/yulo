<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ImagesProperty $imagesProperty
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Images Property'), ['action' => 'edit', $imagesProperty->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Images Property'), ['action' => 'delete', $imagesProperty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imagesProperty->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Images Properties'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Images Property'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="imagesProperties view large-9 medium-8 columns content">
    <h3><?= h($imagesProperty->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= $imagesProperty->has('image') ? $this->Html->link($imagesProperty->image->id, ['controller' => 'Images', 'action' => 'view', $imagesProperty->image->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Property') ?></th>
            <td><?= $imagesProperty->has('property') ? $this->Html->link($imagesProperty->property->id, ['controller' => 'Properties', 'action' => 'view', $imagesProperty->property->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($imagesProperty->id) ?></td>
        </tr>
    </table>
</div>
