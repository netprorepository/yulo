<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\YuloListing $yuloListing
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Yulo Listing'), ['action' => 'edit', $yuloListing->listing_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Yulo Listing'), ['action' => 'delete', $yuloListing->listing_id], ['confirm' => __('Are you sure you want to delete # {0}?', $yuloListing->listing_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Yulo Listing'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Yulo Listing'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="yuloListing view large-9 medium-8 columns content">
    <h3><?= h($yuloListing->listing_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Listing Title') ?></th>
            <td><?= h($yuloListing->listing_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Area') ?></th>
            <td><?= h($yuloListing->listing_area) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Zip') ?></th>
            <td><?= h($yuloListing->listing_zip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Age') ?></th>
            <td><?= h($yuloListing->listing_age) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Images') ?></th>
            <td><?= h($yuloListing->listing_images) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Other Features') ?></th>
            <td><?= h($yuloListing->listing_other_features) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Agent') ?></th>
            <td><?= h($yuloListing->listing_agent) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Id') ?></th>
            <td><?= $this->Number->format($yuloListing->listing_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Display Status') ?></th>
            <td><?= $this->Number->format($yuloListing->listing_display_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Market Status') ?></th>
            <td><?= $this->Number->format($yuloListing->listing_market_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Category') ?></th>
            <td><?= $this->Number->format($yuloListing->listing_category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Type') ?></th>
            <td><?= $this->Number->format($yuloListing->listing_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Sub Type') ?></th>
            <td><?= $this->Number->format($yuloListing->listing_sub_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Price') ?></th>
            <td><?= $this->Number->format($yuloListing->listing_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Square Area') ?></th>
            <td><?= $this->Number->format($yuloListing->listing_square_area) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Rooms') ?></th>
            <td><?= $this->Number->format($yuloListing->listing_rooms) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing State') ?></th>
            <td><?= $this->Number->format($yuloListing->listing_state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing City') ?></th>
            <td><?= $this->Number->format($yuloListing->listing_city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Bedrooms') ?></th>
            <td><?= $this->Number->format($yuloListing->listing_bedrooms) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Bathrooms') ?></th>
            <td><?= $this->Number->format($yuloListing->listing_bathrooms) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Parking') ?></th>
            <td><?= $this->Number->format($yuloListing->listing_parking) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Toilet') ?></th>
            <td><?= $this->Number->format($yuloListing->listing_toilet) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Service Status') ?></th>
            <td><?= $this->Number->format($yuloListing->listing_service_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Premium') ?></th>
            <td><?= $this->Number->format($yuloListing->listing_premium) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Status') ?></th>
            <td><?= $this->Number->format($yuloListing->listing_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Date Added') ?></th>
            <td><?= h($yuloListing->listing_date_added) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Listing Address') ?></h4>
        <?= $this->Text->autoParagraph(h($yuloListing->listing_address)); ?>
    </div>
    <div class="row">
        <h4><?= __('Listing Description') ?></h4>
        <?= $this->Text->autoParagraph(h($yuloListing->listing_description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Listing Video Link') ?></h4>
        <?= $this->Text->autoParagraph(h($yuloListing->listing_video_link)); ?>
    </div>
    <div class="row">
        <h4><?= __('Listing Category Name') ?></h4>
        <?= $this->Text->autoParagraph(h($yuloListing->listing_category_name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Listing City Name') ?></h4>
        <?= $this->Text->autoParagraph(h($yuloListing->listing_city_name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Listing State Name') ?></h4>
        <?= $this->Text->autoParagraph(h($yuloListing->listing_state_name)); ?>
    </div>
</div>
