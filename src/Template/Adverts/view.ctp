<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Advert $advert
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Advert'), ['action' => 'edit', $advert->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Advert'), ['action' => 'delete', $advert->id], ['confirm' => __('Are you sure you want to delete # {0}?', $advert->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Adverts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Advert'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adverts view large-9 medium-8 columns content">
    <h3><?= h($advert->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $advert->has('user') ? $this->Html->link($advert->user->id, ['controller' => 'Users', 'action' => 'view', $advert->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Advert Url') ?></th>
            <td><?= h($advert->advert_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= h($advert->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($advert->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adtype') ?></th>
            <td><?= h($advert->adtype) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($advert->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aprovedby') ?></th>
            <td><?= $this->Number->format($advert->aprovedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adsize') ?></th>
            <td><?= $this->Number->format($advert->adsize) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Uploaddate') ?></th>
            <td><?= h($advert->uploaddate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Startdate') ?></th>
            <td><?= h($advert->startdate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Enddate') ?></th>
            <td><?= h($advert->enddate) ?></td>
        </tr>
    </table>
</div>
