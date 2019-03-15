<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Property'), ['action' => 'edit', $property->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Property'), ['action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Properties'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Agents'), ['controller' => 'Agents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Agent'), ['controller' => 'Agents', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Images Properties'), ['controller' => 'ImagesProperties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Images Property'), ['controller' => 'ImagesProperties', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="properties view large-9 medium-8 columns content">
    <h3><?= h($property->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Listing Title') ?></th>
            <td><?= h($property->listing_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Display Status') ?></th>
            <td><?= h($property->listing_display_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Market Status') ?></th>
            <td><?= h($property->listing_market_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $property->has('category') ? $this->Html->link($property->category->category_name, ['controller' => 'Categories', 'action' => 'view', $property->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Price') ?></th>
            <td><?= h($property->listing_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Square Area') ?></th>
            <td><?= h($property->listing_square_area) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Address') ?></th>
            <td><?= h($property->listing_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= $property->has('state') ? $this->Html->link($property->state->name, ['controller' => 'States', 'action' => 'view', $property->state->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= $property->has('city') ? $this->Html->link($property->city->name, ['controller' => 'Cities', 'action' => 'view', $property->city->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Area') ?></th>
            <td><?= h($property->listing_area) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Zip') ?></th>
            <td><?= h($property->listing_zip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Age') ?></th>
            <td><?= h($property->listing_age) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Video Link') ?></th>
            <td><?= h($property->listing_video_link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Images') ?></th>
            <td><?= h($property->listing_images) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Other Features') ?></th>
            <td><?= h($property->listing_other_features) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Status') ?></th>
            <td><?= h($property->listing_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Agent') ?></th>
            <td><?= $property->has('agent') ? $this->Html->link($property->agent->title, ['controller' => 'Agents', 'action' => 'view', $property->agent->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($property->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categorytype Id') ?></th>
            <td><?= $this->Number->format($property->categorytype_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categorysubtype Id') ?></th>
            <td><?= $this->Number->format($property->categorysubtype_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Rooms') ?></th>
            <td><?= $this->Number->format($property->listing_rooms) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Bedrooms') ?></th>
            <td><?= $this->Number->format($property->listing_bedrooms) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Bathrooms') ?></th>
            <td><?= $this->Number->format($property->listing_bathrooms) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Parking') ?></th>
            <td><?= $this->Number->format($property->listing_parking) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Toilet') ?></th>
            <td><?= $this->Number->format($property->listing_toilet) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Service Status') ?></th>
            <td><?= $this->Number->format($property->listing_service_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Premium') ?></th>
            <td><?= $this->Number->format($property->listing_premium) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Date Added') ?></th>
            <td><?= h($property->listing_date_added) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Listing Description') ?></h4>
        <?= $this->Text->autoParagraph(h($property->listing_description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Images') ?></h4>
        <?php if (!empty($property->images)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Property Id') ?></th>
                <th scope="col"><?= __('Imageurl') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($property->images as $images): ?>
            <tr>
                <td><?= h($images->id) ?></td>
                <td><?= h($images->property_id) ?></td>
                <td><?= h($images->imageurl) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Images', 'action' => 'view', $images->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Images', 'action' => 'edit', $images->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Images', 'action' => 'delete', $images->id], ['confirm' => __('Are you sure you want to delete # {0}?', $images->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Images Properties') ?></h4>
        <?php if (!empty($property->images_properties)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Image Id') ?></th>
                <th scope="col"><?= __('Property Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($property->images_properties as $imagesProperties): ?>
            <tr>
                <td><?= h($imagesProperties->id) ?></td>
                <td><?= h($imagesProperties->image_id) ?></td>
                <td><?= h($imagesProperties->property_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ImagesProperties', 'action' => 'view', $imagesProperties->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ImagesProperties', 'action' => 'edit', $imagesProperties->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ImagesProperties', 'action' => 'delete', $imagesProperties->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imagesProperties->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
