<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subscription $subscription
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Subscription'), ['action' => 'edit', $subscription->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Subscription'), ['action' => 'delete', $subscription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subscription->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Subscriptions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subscription'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Plans'), ['controller' => 'Plans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Plan'), ['controller' => 'Plans', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Agents'), ['controller' => 'Agents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Agent'), ['controller' => 'Agents', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="subscriptions view large-9 medium-8 columns content">
    <h3><?= h($subscription->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Plan') ?></th>
            <td><?= $subscription->has('plan') ? $this->Html->link($subscription->plan->name, ['controller' => 'Plans', 'action' => 'view', $subscription->plan->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Agent') ?></th>
            <td><?= $subscription->has('agent') ? $this->Html->link($subscription->agent->title, ['controller' => 'Agents', 'action' => 'view', $subscription->agent->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Enddate') ?></th>
            <td><?= h($subscription->enddate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amountpaid') ?></th>
            <td><?= h($subscription->amountpaid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($subscription->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No Of Properties Available') ?></th>
            <td><?= $this->Number->format($subscription->no_of_properties_available) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No Of Properties Uploaded') ?></th>
            <td><?= $this->Number->format($subscription->no_of_properties_uploaded) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Startdate') ?></th>
            <td><?= h($subscription->startdate) ?></td>
        </tr>
    </table>
</div>
