<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property int $agent_id
 * @property int $amount
 * @property string $description
 * @property \Cake\I18n\FrozenTime $transaction_date
 * @property string $gateway_response
 * @property string $reference
 *
 * @property \App\Model\Entity\Agent $agent
 */
class Transaction extends Entity
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
        'amount' => true,
        'description' => true,
        'transaction_date' => true,
        'gateway_response' => true,
        'reference' => true,
        'agent' => true
    ];
}
