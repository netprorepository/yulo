<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\YuloListing $yuloListing
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Yulo Listing'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="yuloListing form large-9 medium-8 columns content">
    <?= $this->Form->create($yuloListing) ?>
    <fieldset>
        <legend><?= __('Add Yulo Listing') ?></legend>
        <?php
            echo $this->Form->control('listing_title');
            echo $this->Form->control('listing_display_status');
            echo $this->Form->control('listing_market_status');
            echo $this->Form->control('listing_category');
            echo $this->Form->control('listing_type');
            echo $this->Form->control('listing_sub_type');
            echo $this->Form->control('listing_price');
            echo $this->Form->control('listing_square_area');
            echo $this->Form->control('listing_rooms');
            echo $this->Form->control('listing_address');
            echo $this->Form->control('listing_state');
            echo $this->Form->control('listing_city');
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
            echo $this->Form->control('listing_agent');
            echo $this->Form->control('listing_date_added', ['empty' => true]);
            echo $this->Form->control('listing_premium');
            echo $this->Form->control('listing_category_name');
            echo $this->Form->control('listing_city_name');
            echo $this->Form->control('listing_state_name');
            echo $this->Form->control('listing_status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
