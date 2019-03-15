<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Advertiser $advertiser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Advertiser'), ['action' => 'edit', $advertiser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Advertiser'), ['action' => 'delete', $advertiser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $advertiser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Advertisers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Advertiser'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="advertisers view large-9 medium-8 columns content">
    <h3><?= h($advertiser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Fname') ?></th>
            <td><?= h($advertiser->fname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lname') ?></th>
            <td><?= h($advertiser->lname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($advertiser->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $advertiser->has('user') ? $this->Html->link($advertiser->user->id, ['controller' => 'Users', 'action' => 'view', $advertiser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($advertiser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdon') ?></th>
            <td><?= h($advertiser->createdon) ?></td>
        </tr>
    </table>
</div>
