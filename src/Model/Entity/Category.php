<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity
 *
 * @property int $id
 * @property string $category_name
 * @property int $status
 *
 * @property \App\Model\Entity\Property[] $properties
 * @property \App\Model\Entity\YuloCategorytype[] $yulo_categorytype
 */
class Category extends Entity
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
        'category_name' => true,
        'status' => true,
        'properties' => true,
        'yulo_categorytype' => true
    ];
}
