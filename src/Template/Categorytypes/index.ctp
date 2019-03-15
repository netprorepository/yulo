<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categorytype[]|\Cake\Collection\CollectionInterface $categorytypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Categorytype'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categorytypes index large-9 medium-8 columns content">
    <h3><?= __('Categorytypes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categorytypename') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorytypes as $categorytype): ?>
            <tr>
                <td><?= $this->Number->format($categorytype->id) ?></td>
                <td><?= $categorytype->has('category') ? $this->Html->link($categorytype->category->category_name, ['controller' => 'Categories', 'action' => 'view', $categorytype->category->id]) : '' ?></td>
                <td><?= h($categorytype->categorytypename) ?></td>
                <td><?= $this->Number->format($categorytype->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $categorytype->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $categorytype->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $categorytype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categorytype->id)]) ?>
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
