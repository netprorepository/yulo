<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * YuloListing Entity
 *
 * @property int $listing_id
 * @property string $listing_title
 * @property int $listing_display_status
 * @property int $listing_market_status
 * @property int $listing_category
 * @property int $listing_type
 * @property int $listing_sub_type
 * @property float $listing_price
 * @property float $listing_square_area
 * @property int $listing_rooms
 * @property string $listing_address
 * @property int $listing_state
 * @property int $listing_city
 * @property string $listing_area
 * @property string $listing_zip
 * @property string $listing_age
 * @property int $listing_bedrooms
 * @property int $listing_bathrooms
 * @property int $listing_parking
 * @property int $listing_toilet
 * @property string $listing_description
 * @property string $listing_video_link
 * @property int $listing_service_status
 * @property string $listing_images
 * @property string $listing_other_features
 * @property string $listing_agent
 * @property \Cake\I18n\FrozenTime $listing_date_added
 * @property int $listing_premium
 * @property string $listing_category_name
 * @property string $listing_city_name
 * @property string $listing_state_name
 * @property int $listing_status
 *
 * @property \App\Model\Entity\Listing $listing
 */
class YuloListing extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'listing_title' => true,
        'listing_display_status' => true,
        'listing_market_status' => true,
        'listing_category' => true,
        'listing_type' => true,
        'listing_sub_type' => true,
        'listing_price' => true,
        'listing_square_area' => true,
        'listing_rooms' => true,
        'listing_address' => true,
        'listing_state' => true,
        'listing_city' => true,
        'listing_area' => true,
        'listing_zip' => true,
        'listing_age' => true,
        'listing_bedrooms' => true,
        'listing_bathrooms' => true,
        'listing_parking' => true,
        'listing_toilet' => true,
        'listing_description' => true,
        'listing_video_link' => true,
        'listing_service_status' => true,
        'listing_images' => true,
        'listing_other_features' => true,
        'listing_agent' => true,
        'listing_date_added' => true,
        'listing_premium' => true,
        'listing_category_name' => true,
        'listing_city_name' => true,
        'listing_state_name' => true,
        'listing_status' => true,
        'listing' => true
    ];
}
