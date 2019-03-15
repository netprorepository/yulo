<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Advert Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $advert_url
 * @property \Cake\I18n\FrozenTime $uploaddate
 * @property string $amount
 * @property \Cake\I18n\FrozenDate $startdate
 * @property \Cake\I18n\FrozenDate $enddate
 * @property string $status
 * @property int $aprovedby
 * @property int $adsize
 * @property string $adtype
 *
 * @property \App\Model\Entity\User $user
 */
class Advert extends Entity
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
        'advert_url' => true,
        'uploaddate' => true,
        'amount' => true,
        'startdate' => true,
        'enddate' => true,
        'status' => true,
        'aprovedby' => true,
        'adsize' => true,
        'adtype' => true,
        'duration' => true,
        'web_url' => true,
        'user' => true
    ];
}
