<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ImagesProperty[]|\Cake\Collection\CollectionInterface $imagesProperties
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Images Property'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="imagesProperties index large-9 medium-8 columns content">
    <h3><?= __('Images Properties') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('property_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($imagesProperties as $imagesProperty): ?>
            <tr>
                <td><?= $this->Number->format($imagesProperty->id) ?></td>
                <td><?= $imagesProperty->has('image') ? $this->Html->link($imagesProperty->image->id, ['controller' => 'Images', 'action' => 'view', $imagesProperty->image->id]) : '' ?></td>
                <td><?= $imagesProperty->has('property') ? $this->Html->link($imagesProperty->property->id, ['controller' => 'Properties', 'action' => 'view', $imagesProperty->property->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $imagesProperty->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $imagesProperty->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $imagesProperty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imagesProperty->id)]) ?>
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
