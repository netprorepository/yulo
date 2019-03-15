<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Properties'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Agents'), ['controller' => 'Agents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Agent'), ['controller' => 'Agents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images Properties'), ['controller' => 'ImagesProperties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Images Property'), ['controller' => 'ImagesProperties', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="properties form large-9 medium-8 columns content">
    <?= $this->Form->create($property) ?>
    <fieldset>
        <legend><?= __('Add Property') ?></legend>
        <?php
            echo $this->Form->control('listing_title');
            echo $this->Form->control('listing_display_status');
            echo $this->Form->control('listing_market_status');
            echo $this->Form->control('category_id', ['options' => $categories]);
            echo $this->Form->control('categorytype_id');
            echo $this->Form->control('categorysubtype_id');
            echo $this->Form->control('listing_price');
            echo $this->Form->control('listing_square_area');
            echo $this->Form->control('listing_rooms');
            echo $this->Form->control('listing_address');
            echo $this->Form->control('state_id', ['options' => $states, 'empty' => true]);
            echo $this->Form->control('city_id', ['options' => $cities, 'empty' => true]);
            echo $this->Form->control('listing_area');
            echo $this->Form->control('listing_zip');
            echo $this->Form->control('listing_age');
            echo $this->Form->control('listing_bedrooms');
            echo $this->Form->control('listing_bathrooms');
            echo $this->Form->control('listing_parking');
            echo $this->Form->control('listing_toilet');
            echo $this->Form->control('listing_description');
            echo $this->Form->control('listing_video_link');
            echo $this->Form->control('listing_service_status');
            echo $this->Form->control('listing_images');
            echo $this->Form->control('listing_other_features');
            echo $this->Form->control('listing_date_added', ['empty' => true]);
            echo $this->Form->control('listing_premium');
            echo $this->Form->control('listing_status');
            echo $this->Form->control('agent_id', ['options' => $agents]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
