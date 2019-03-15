<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Adverts Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Advert get($primaryKey, $options = [])
 * @method \App\Model\Entity\Advert newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Advert[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Advert|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Advert patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Advert[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Advert findOrCreate($search, callable $callback = null, $options = [])
 */
class AdvertsTable extends Table
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

        $this->setTable('adverts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->scalar('advert_url')
            ->requirePresence('advert_url', 'create')
            ->notEmpty('advert_url');

        $validator
            ->scalar('duration','wrong duration value')
            ->requirePresence('duration', 'create')
            ->notEmpty('duration');

        $validator
            ->scalar('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

//        $validator
//            ->date('startdate')
//            ->requirePresence('startdate', 'create')
//            ->notEmpty('startdate');
//
//        $validator
//            ->date('enddate')
//            ->requirePresence('enddate', 'create')
//            ->notEmpty('enddate');
//
//        $validator
//            ->scalar('status')
//            ->requirePresence('status', 'create')
//            ->notEmpty('status');
//
//        $validator
//            ->integer('aprovedby')
//            ->requirePresence('aprovedby', 'create')
//            ->notEmpty('aprovedby');
//
//        $validator
//            ->integer('adsize')
//            ->requirePresence('adsize', 'create')
//            ->notEmpty('adsize');
//
//        $validator
//            ->scalar('adtype')
//            ->requirePresence('adtype', 'create')
//            ->notEmpty('adtype');

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

        return $rules;
    }
}
