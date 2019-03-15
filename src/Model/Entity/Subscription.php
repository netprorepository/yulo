<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Subscription Entity
 *
 * @property int $id
 * @property int $plan_id
 * @property int $agent_id
 * @property \Cake\I18n\FrozenTime $startdate
 * @property string $enddate
 * @property string $amountpaid
 * @property int $no_of_properties_available
 * @property int $no_of_properties_uploaded
 *
 * @property \App\Model\Entity\Plan $plan
 * @property \App\Model\Entity\Agent $agent
 */
class Subscription extends Entity
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
        'plan_id' => true,
        'agent_id' => true,
        'startdate' => true,
        'enddate' => true,
        'amountpaid' => true,
        'no_of_properties_available' => true,
        'no_of_properties_uploaded' => true,
        'plan' => true,
        'agent' => true,
        'sub_status' =>true,
        'pushed_ups'=> true
    ];
}
