<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categorysubtype $categorysubtype
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Categorysubtype'), ['action' => 'edit', $categorysubtype->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Categorysubtype'), ['action' => 'delete', $categorysubtype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categorysubtype->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categorysubtypes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categorysubtype'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categorysubtypes view large-9 medium-8 columns content">
    <h3><?= h($categorysubtype->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Categorysubtypename') ?></th>
            <td><?= h($categorysubtype->categorysubtypename) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($categorysubtype->id) ?></td>
        </tr>
    </table>
</div>
