<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Plan Entity
 *
 * @property int $id
 * @property string $name
 * @property string $amount
 * @property string $desc
 * @property string $properties
 * @property int $premium_listing
 * @property int $number_of_properties
 * @property int $property_availability
 * @property int $status
 *
 * @property \App\Model\Entity\YuloUsersplan[] $yulo_usersplan
 */
class Plan extends Entity
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
        'name' => true,
        'amount' => true,
        'description' => true,
        'properties' => true,
        'premium_listing' => true,
        'number_of_properties' => true,
        'property_availability' => true,
        'status' => true,
        'push_ups' => true,
        'yulo_usersplan' => true
    ];
}
