<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City $city
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit City'), ['action' => 'edit', $city->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete City'), ['action' => 'delete', $city->id], ['confirm' => __('Are you sure you want to delete # {0}?', $city->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Yulo Areas'), ['controller' => 'YuloAreas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Yulo Area'), ['controller' => 'YuloAreas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cities view large-9 medium-8 columns content">
    <h3><?= h($city->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($city->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($city->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Yulo Areas') ?></h4>
        <?php if (!empty($city->yulo_areas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($city->yulo_areas as $yuloAreas): ?>
            <tr>
                <td><?= h($yuloAreas->id) ?></td>
                <td><?= h($yuloAreas->name) ?></td>
                <td><?= h($yuloAreas->city_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'YuloAreas', 'action' => 'view', $yuloAreas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'YuloAreas', 'action' => 'edit', $yuloAreas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'YuloAreas', 'action' => 'delete', $yuloAreas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $yuloAreas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
