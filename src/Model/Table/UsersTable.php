<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\AgentsTable|\Cake\ORM\Association\HasMany $Agents
 * @property \App\Model\Table\YuloTransactionsTable|\Cake\ORM\Association\HasMany $YuloTransactions
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Agents', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('YuloTransactions', [
            'foreignKey' => 'user_id'
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')
            ->requirePresence('username', 'create')
            ->notEmpty('username','Please provide a valid email address as your user name')
          ->add('username', ['unique' => ['rule' => 'validateUnique', 'provider' => 'table', 'message' => 'username already exists']])   
	    ->add('username', 'valid-email', ['rule' => 'email'])
            ->requirePresence('password', 'create')
            ->add('password', [ 'length' => [ 'rule' => ['minLength', 6],
            'message' => 'Invalid password. password must not be less than six characters', ]])
	   ->allowEmpty('no_of_logon')
	    ->allowEmpty('referer')
           ->notEmpty('password')
           ->notEmpty('cpassword')
           ->add('cpassword', 'custom', [
                    'rule' => function($value, $context) {
                        if ($value !== $context['data']['password']) {
                            return false;
                        }
                        return true;
                   },
                  'message' => 'Password mismatch. Please verify your password and try again',
        ]);   

//        $validator
//            ->dateTime('createdon')
//            ->requirePresence('createdon', 'create')
//            ->notEmpty('createdon');
//
//        $validator
//            ->scalar('verificationstatus')
//            ->requirePresence('verificationstatus', 'create')
//            ->notEmpty('verificationstatus');
//
//        $validator
//            ->scalar('verificationkey')
//            ->requirePresence('verificationkey', 'create')
//            ->notEmpty('verificationkey');
       $validator
            ->requirePresence('accounttype', 'create')
           ->notEmpty('accounttype', 'Please Select an Account Type')
            ->add('accounttype', 'inList', [
                'rule' => ['inList', ['Property Owner', 'Agent','User','Advertiser']],
                'message' => 'Please choose a valid account type'
            ])                 
           ->notEmpty('accounttype');

//        $validator
//            ->scalar('accounttype')
//            ->requirePresence('accounttype', 'create')
//            ->notEmpty('accounttype');

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
        $rules->add($rules->isUnique(['username']));

        return $rules;
    }
}
