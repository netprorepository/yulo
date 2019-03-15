<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categorytype $categorytype
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Categorytype'), ['action' => 'edit', $categorytype->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Categorytype'), ['action' => 'delete', $categorytype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categorytype->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categorytypes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categorytype'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categorytypes view large-9 medium-8 columns content">
    <h3><?= h($categorytype->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $categorytype->has('category') ? $this->Html->link($categorytype->category->category_name, ['controller' => 'Categories', 'action' => 'view', $categorytype->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categorytypename') ?></th>
            <td><?= h($categorytype->categorytypename) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($categorytype->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($categorytype->status) ?></td>
        </tr>
    </table>
</div>
