<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plan $plan
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Plan'), ['action' => 'edit', $plan->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Plan'), ['action' => 'delete', $plan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $plan->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Plans'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Plan'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Yulo Usersplan'), ['controller' => 'YuloUsersplan', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Yulo Usersplan'), ['controller' => 'YuloUsersplan', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="plans view large-9 medium-8 columns content">
    <h3><?= h($plan->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($plan->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= h($plan->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Desc') ?></th>
            <td><?= h($plan->desc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Properties') ?></th>
            <td><?= h($plan->properties) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($plan->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Premium Listing') ?></th>
            <td><?= $this->Number->format($plan->premium_listing) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number Of Properties') ?></th>
            <td><?= $this->Number->format($plan->number_of_properties) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Property Availability') ?></th>
            <td><?= $this->Number->format($plan->property_availability) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($plan->status) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Yulo Usersplan') ?></h4>
        <?php if (!empty($plan->yulo_usersplan)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Plan Id') ?></th>
                <th scope="col"><?= __('Account Id') ?></th>
                <th scope="col"><?= __('Userplan Period') ?></th>
                <th scope="col"><?= __('Created Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Premium Property') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($plan->yulo_usersplan as $yuloUsersplan): ?>
            <tr>
                <td><?= h($yuloUsersplan->id) ?></td>
                <td><?= h($yuloUsersplan->plan_id) ?></td>
                <td><?= h($yuloUsersplan->account_id) ?></td>
                <td><?= h($yuloUsersplan->userplan_period) ?></td>
                <td><?= h($yuloUsersplan->created_date) ?></td>
                <td><?= h($yuloUsersplan->end_date) ?></td>
                <td><?= h($yuloUsersplan->premium_property) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'YuloUsersplan', 'action' => 'view', $yuloUsersplan->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'YuloUsersplan', 'action' => 'edit', $yuloUsersplan->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'YuloUsersplan', 'action' => 'delete', $yuloUsersplan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $yuloUsersplan->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
