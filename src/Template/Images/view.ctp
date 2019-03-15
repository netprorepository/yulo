<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Image'), ['action' => 'edit', $image->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Image'), ['action' => 'delete', $image->id], ['confirm' => __('Are you sure you want to delete # {0}?', $image->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="images view large-9 medium-8 columns content">
    <h3><?= h($image->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Imageurl') ?></th>
            <td><?= h($image->imageurl) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($image->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Property Id') ?></th>
            <td><?= $this->Number->format($image->property_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Properties') ?></h4>
        <?php if (!empty($image->properties)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Listing Title') ?></th>
                <th scope="col"><?= __('Listing Display Status') ?></th>
                <th scope="col"><?= __('Listing Market Status') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('Listing Type') ?></th>
                <th scope="col"><?= __('Listing Sub Type') ?></th>
                <th scope="col"><?= __('Listing Price') ?></th>
                <th scope="col"><?= __('Listing Square Area') ?></th>
                <th scope="col"><?= __('Listing Rooms') ?></th>
                <th scope="col"><?= __('Listing Address') ?></th>
                <th scope="col"><?= __('Listing State') ?></th>
                <th scope="col"><?= __('Listing City') ?></th>
                <th scope="col"><?= __('Listing Area') ?></th>
                <th scope="col"><?= __('Listing Zip') ?></th>
                <th scope="col"><?= __('Listing Age') ?></th>
                <th scope="col"><?= __('Listing Bedrooms') ?></th>
                <th scope="col"><?= __('Listing Bathrooms') ?></th>
                <th scope="col"><?= __('Listing Parking') ?></th>
                <th scope="col"><?= __('Listing Toilet') ?></th>
                <th scope="col"><?= __('Listing Description') ?></th>
                <th scope="col"><?= __('Listing Video Link') ?></th>
                <th scope="col"><?= __('Listing Service Status') ?></th>
                <th scope="col"><?= __('Listing Images') ?></th>
                <th scope="col"><?= __('Listing Other Features') ?></th>
                <th scope="col"><?= __('Listing Agent') ?></th>
                <th scope="col"><?= __('Listing Date Added') ?></th>
                <th scope="col"><?= __('Listing Premium') ?></th>
                <th scope="col"><?= __('Listing Category Name') ?></th>
                <th scope="col"><?= __('Listing City Name') ?></th>
                <th scope="col"><?= __('Listing State Name') ?></th>
                <th scope="col"><?= __('Listing Status') ?></th>
                <th scope="col"><?= __('Agent Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($image->properties as $properties): ?>
            <tr>
                <td><?= h($properties->id) ?></td>
                <td><?= h($properties->listing_title) ?></td>
                <td><?= h($properties->listing_display_status) ?></td>
                <td><?= h($properties->listing_market_status) ?></td>
                <td><?= h($properties->category_id) ?></td>
                <td><?= h($properties->listing_type) ?></td>
                <td><?= h($properties->listing_sub_type) ?></td>
                <td><?= h($properties->listing_price) ?></td>
                <td><?= h($properties->listing_square_area) ?></td>
                <td><?= h($properties->listing_rooms) ?></td>
                <td><?= h($properties->listing_address) ?></td>
                <td><?= h($properties->listing_state) ?></td>
                <td><?= h($properties->listing_city) ?></td>
                <td><?= h($properties->listing_area) ?></td>
                <td><?= h($properties->listing_zip) ?></td>
                <td><?= h($properties->listing_age) ?></td>
                <td><?= h($properties->listing_bedrooms) ?></td>
                <td><?= h($properties->listing_bathrooms) ?></td>
                <td><?= h($properties->listing_parking) ?></td>
                <td><?= h($properties->listing_toilet) ?></td>
                <td><?= h($properties->listing_description) ?></td>
                <td><?= h($properties->listing_video_link) ?></td>
                <td><?= h($properties->listing_service_status) ?></td>
                <td><?= h($properties->listing_images) ?></td>
                <td><?= h($properties->listing_other_features) ?></td>
                <td><?= h($properties->listing_agent) ?></td>
                <td><?= h($properties->listing_date_added) ?></td>
                <td><?= h($properties->listing_premium) ?></td>
                <td><?= h($properties->listing_category_name) ?></td>
                <td><?= h($properties->listing_city_name) ?></td>
                <td><?= h($properties->listing_state_name) ?></td>
                <td><?= h($properties->listing_status) ?></td>
                <td><?= h($properties->agent_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Properties', 'action' => 'view', $properties->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Properties', 'action' => 'edit', $properties->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Properties', 'action' => 'delete', $properties->id], ['confirm' => __('Are you sure you want to delete # {0}?', $properties->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
