<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Admin Entity
 *
 * @property int $id
 * @property string $name
 * @property int $roleid
 * @property int $createdon
 * @property int $addedby
 * @property string $adminstatus
 * @property int $user_id
 *
 * @property \App\Model\Entity\User $user
 */
class Admin extends Entity
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
        'roleid' => true,
        'createdon' => true,
        'addedby' => true,
        'adminstatus' => true,
        'user_id' => true,
        'user' => true
    ];
}
