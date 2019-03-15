<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Agents Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\StatesTable|\Cake\ORM\Association\BelongsTo $States
 *
 * @method \App\Model\Entity\Agent get($primaryKey, $options = [])
 * @method \App\Model\Entity\Agent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Agent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Agent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Agent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Agent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Agent findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AgentsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('agents');
        $this->setDisplayField('fullname');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('States', [
            'foreignKey' => 'state_id'
        ]);
        
          $this->hasMany('Subscriptions', [
            'foreignKey' => 'agent_id',
            'joinType' => 'INNER'
        ]);
          
           $this->hasMany('Properties', [
            'foreignKey' => 'agent_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('title')
            ->allowEmpty('title');

        $validator
            ->scalar('fullname')
            ->allowEmpty('fullname');

        $validator
            ->scalar('phone')
            ->allowEmpty('phone');

        $validator
            ->scalar('about')
            ->allowEmpty('about');

        $validator
            ->scalar('addres')
            ->allowEmpty('addres');

        $validator
            ->scalar('street')
            ->allowEmpty('street');

        $validator
            ->scalar('locality')
            ->allowEmpty('locality');

        $validator
            ->scalar('country')
            ->allowEmpty('country');

        $validator
            ->scalar('fb')
            ->allowEmpty('fb');

        $validator
            ->scalar('tw')
            ->allowEmpty('tw');

        $validator
            ->scalar('ln')
            ->allowEmpty('ln');

        $validator
            ->scalar('gg')
            ->allowEmpty('gg');

        $validator
            ->integer('account_status')
            ->allowEmpty('account_status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['state_id'], 'States'));

        return $rules;
    }
}
