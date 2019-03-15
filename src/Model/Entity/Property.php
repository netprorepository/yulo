<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Property Entity
 *
 * @property int $id
 * @property string $listing_title
 * @property string $listing_display_status
 * @property string $listing_market_status
 * @property int $category_id
 * @property int $categorytype_id
 * @property int $categorysubtype_id
 * @property string $listing_price
 * @property string $listing_square_area
 * @property int $listing_rooms
 * @property string $listing_address
 * @property int $state_id
 * @property int $city_id
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
 * @property \Cake\I18n\FrozenTime $listing_date_added
 * @property int $listing_premium
 * @property string $listing_status
 * @property int $agent_id
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\Agent $agent
 * @property \App\Model\Entity\Image[] $images
 */
class Property extends Entity
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
        'category_id' => true,
        'categorytype_id' => true,
        'categorysubtype_id' => true,
        'listing_price' => true,
        'listing_square_area' => true,
        'listing_rooms' => true,
        'listing_address' => true,
        'state_id' => true,
        'city_id' => true,
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
        'listing_date_added' => true,
        'listing_premium' => true,
        'listing_status' => true,
        'agent_id' => true,
        'category' => true,
        'state' => true,
        'city' => true,
        'agent' => true,
        'push_up_status' => true,
        'push_up_date' =>true,
        'images' => true
    ];
}
