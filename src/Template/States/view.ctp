<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\State $state
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit State'), ['action' => 'edit', $state->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete State'), ['action' => 'delete', $state->id], ['confirm' => __('Are you sure you want to delete # {0}?', $state->id)]) ?> </li>
        <li><?= $this->Html->link(__('List States'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New State'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Agents'), ['controller' => 'Agents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Agent'), ['controller' => 'Agents', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Yulo Cities'), ['controller' => 'YuloCities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Yulo City'), ['controller' => 'YuloCities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="states view large-9 medium-8 columns content">
    <h3><?= h($state->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($state->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($state->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country Id') ?></th>
            <td><?= $this->Number->format($state->country_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Agents') ?></h4>
        <?php if (!empty($state->agents)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Fullname') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('About') ?></th>
                <th scope="col"><?= __('Addres') ?></th>
                <th scope="col"><?= __('Street') ?></th>
                <th scope="col"><?= __('Locality') ?></th>
                <th scope="col"><?= __('State Id') ?></th>
                <th scope="col"><?= __('Country') ?></th>
                <th scope="col"><?= __('Fb') ?></th>
                <th scope="col"><?= __('Tw') ?></th>
                <th scope="col"><?= __('Ln') ?></th>
                <th scope="col"><?= __('Gg') ?></th>
                <th scope="col"><?= __('Account Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($state->agents as $agents): ?>
            <tr>
                <td><?= h($agents->id) ?></td>
                <td><?= h($agents->user_id) ?></td>
                <td><?= h($agents->title) ?></td>
                <td><?= h($agents->fullname) ?></td>
                <td><?= h($agents->phone) ?></td>
                <td><?= h($agents->about) ?></td>
                <td><?= h($agents->addres) ?></td>
                <td><?= h($agents->street) ?></td>
                <td><?= h($agents->locality) ?></td>
                <td><?= h($agents->state_id) ?></td>
                <td><?= h($agents->country) ?></td>
                <td><?= h($agents->fb) ?></td>
                <td><?= h($agents->tw) ?></td>
                <td><?= h($agents->ln) ?></td>
                <td><?= h($agents->gg) ?></td>
                <td><?= h($agents->account_status) ?></td>
                <td><?= h($agents->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Agents', 'action' => 'view', $agents->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Agents', 'action' => 'edit', $agents->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Agents', 'action' => 'delete', $agents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $agents->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Yulo Cities') ?></h4>
        <?php if (!empty($state->yulo_cities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('State Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($state->yulo_cities as $yuloCities): ?>
            <tr>
                <td><?= h($yuloCities->id) ?></td>
                <td><?= h($yuloCities->name) ?></td>
                <td><?= h($yuloCities->state_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'YuloCities', 'action' => 'view', $yuloCities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'YuloCities', 'action' => 'edit', $yuloCities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'YuloCities', 'action' => 'delete', $yuloCities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $yuloCities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
