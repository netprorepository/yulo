<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\YuloListing[]|\Cake\Collection\CollectionInterface $yuloListing
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Yulo Listing'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="yuloListing index large-9 medium-8 columns content">
    <h3><?= __('Yulo Listing') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('listing_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_display_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_market_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_category') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_sub_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_square_area') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_rooms') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_state') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_area') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_zip') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_age') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_bedrooms') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_bathrooms') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_parking') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_toilet') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_service_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_images') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_other_features') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_agent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_date_added') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_premium') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($yuloListing as $yuloListing): ?>
            <tr>
                <td><?= $this->Number->format($yuloListing->listing_id) ?></td>
                <td><?= h($yuloListing->listing_title) ?></td>
                <td><?= $this->Number->format($yuloListing->listing_display_status) ?></td>
                <td><?= $this->Number->format($yuloListing->listing_market_status) ?></td>
                <td><?= $this->Number->format($yuloListing->listing_category) ?></td>
                <td><?= $this->Number->format($yuloListing->listing_type) ?></td>
                <td><?= $this->Number->format($yuloListing->listing_sub_type) ?></td>
                <td><?= $this->Number->format($yuloListing->listing_price) ?></td>
                <td><?= $this->Number->format($yuloListing->listing_square_area) ?></td>
                <td><?= $this->Number->format($yuloListing->listing_rooms) ?></td>
                <td><?= $this->Number->format($yuloListing->listing_state) ?></td>
                <td><?= $this->Number->format($yuloListing->listing_city) ?></td>
                <td><?= h($yuloListing->listing_area) ?></td>
                <td><?= h($yuloListing->listing_zip) ?></td>
                <td><?= h($yuloListing->listing_age) ?></td>
                <td><?= $this->Number->format($yuloListing->listing_bedrooms) ?></td>
                <td><?= $this->Number->format($yuloListing->listing_bathrooms) ?></td>
                <td><?= $this->Number->format($yuloListing->listing_parking) ?></td>
                <td><?= $this->Number->format($yuloListing->listing_toilet) ?></td>
                <td><?= $this->Number->format($yuloListing->listing_service_status) ?></td>
                <td><?= h($yuloListing->listing_images) ?></td>
                <td><?= h($yuloListing->listing_other_features) ?></td>
                <td><?= h($yuloListing->listing_agent) ?></td>
                <td><?= h($yuloListing->listing_date_added) ?></td>
                <td><?= $this->Number->format($yuloListing->listing_premium) ?></td>
                <td><?= $this->Number->format($yuloListing->listing_status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $yuloListing->listing_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $yuloListing->listing_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $yuloListing->listing_id], ['confirm' => __('Are you sure you want to delete # {0}?', $yuloListing->listing_id)]) ?>
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
