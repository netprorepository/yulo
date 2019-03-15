<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Agents'), ['controller' => 'Agents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Agent'), ['controller' => 'Agents', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Yulo Transactions'), ['controller' => 'YuloTransactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Yulo Transaction'), ['controller' => 'YuloTransactions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Verificationstatus') ?></th>
            <td><?= h($user->verificationstatus) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Verificationkey') ?></th>
            <td><?= h($user->verificationkey) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Accounttype') ?></th>
            <td><?= h($user->accounttype) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdon') ?></th>
            <td><?= h($user->createdon) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Agents') ?></h4>
        <?php if (!empty($user->agents)): ?>
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
            <?php foreach ($user->agents as $agents): ?>
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
        <h4><?= __('Related Yulo Transactions') ?></h4>
        <?php if (!empty($user->yulo_transactions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Trans Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Transaction Date') ?></th>
                <th scope="col"><?= __('Gateway Response') ?></th>
                <th scope="col"><?= __('Reference') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->yulo_transactions as $yuloTransactions): ?>
            <tr>
                <td><?= h($yuloTransactions->trans_id) ?></td>
                <td><?= h($yuloTransactions->user_id) ?></td>
                <td><?= h($yuloTransactions->amount) ?></td>
                <td><?= h($yuloTransactions->description) ?></td>
                <td><?= h($yuloTransactions->transaction_date) ?></td>
                <td><?= h($yuloTransactions->gateway_response) ?></td>
                <td><?= h($yuloTransactions->reference) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'YuloTransactions', 'action' => 'view', $yuloTransactions->trans_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'YuloTransactions', 'action' => 'edit', $yuloTransactions->trans_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'YuloTransactions', 'action' => 'delete', $yuloTransactions->trans_id], ['confirm' => __('Are you sure you want to delete # {0}?', $yuloTransactions->trans_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
