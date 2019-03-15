<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Agent Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $fullname
 * @property string $phone
 * @property string $about
 * @property string $addres
 * @property string $street
 * @property string $locality
 * @property int $state_id
 * @property string $country
 * @property string $fb
 * @property string $tw
 * @property string $ln
 * @property string $gg
 * @property int $account_status
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\State $state
 */
class Agent extends Entity
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
        'user_id' => true,
        'title' => true,
        'fullname' => true,
        'phone' => true,
        'about' => true,
        'addres' => true,
        'street' => true,
        'locality' => true,
        'state_id' => true,
        'country' => true,
        'fb' => true,
        'tw' => true,
        'ln' => true,
        'gg' => true,
        'account_status' => true,
        'created' => true,
        'user' => true,
        'state' => true,
        'pix_url' => true,
        'gender' => true
    ];
}
