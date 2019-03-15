<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Advertiser[]|\Cake\Collection\CollectionInterface $advertisers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Advertiser'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="advertisers index large-9 medium-8 columns content">
    <h3><?= __('Advertisers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('createdon') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($advertisers as $advertiser): ?>
            <tr>
                <td><?= $this->Number->format($advertiser->id) ?></td>
                <td><?= h($advertiser->fname) ?></td>
                <td><?= h($advertiser->lname) ?></td>
                <td><?= h($advertiser->phone) ?></td>
                <td><?= h($advertiser->createdon) ?></td>
                <td><?= $advertiser->has('user') ? $this->Html->link($advertiser->user->id, ['controller' => 'Users', 'action' => 'view', $advertiser->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $advertiser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $advertiser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $advertiser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $advertiser->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
