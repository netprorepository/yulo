<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Agent $agent
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Agent'), ['action' => 'edit', $agent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Agent'), ['action' => 'delete', $agent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $agent->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Agents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Agent'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="agents view large-9 medium-8 columns content">
    <h3><?= h($agent->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $agent->has('user') ? $this->Html->link($agent->user->id, ['controller' => 'Users', 'action' => 'view', $agent->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($agent->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fullname') ?></th>
            <td><?= h($agent->fullname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($agent->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= $agent->has('state') ? $this->Html->link($agent->state->name, ['controller' => 'States', 'action' => 'view', $agent->state->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fb') ?></th>
            <td><?= h($agent->fb) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tw') ?></th>
            <td><?= h($agent->tw) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ln') ?></th>
            <td><?= h($agent->ln) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gg') ?></th>
            <td><?= h($agent->gg) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($agent->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account Status') ?></th>
            <td><?= $this->Number->format($agent->account_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($agent->created) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('About') ?></h4>
        <?= $this->Text->autoParagraph(h($agent->about)); ?>
    </div>
    <div class="row">
        <h4><?= __('Addres') ?></h4>
        <?= $this->Text->autoParagraph(h($agent->addres)); ?>
    </div>
    <div class="row">
        <h4><?= __('Street') ?></h4>
        <?= $this->Text->autoParagraph(h($agent->street)); ?>
    </div>
    <div class="row">
        <h4><?= __('Locality') ?></h4>
        <?= $this->Text->autoParagraph(h($agent->locality)); ?>
    </div>
    <div class="row">
        <h4><?= __('Country') ?></h4>
        <?= $this->Text->autoParagraph(h($agent->country)); ?>
    </div>
</div>
