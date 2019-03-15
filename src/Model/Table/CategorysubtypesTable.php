<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Categorysubtypes Model
 *
 * @method \App\Model\Entity\Categorysubtype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Categorysubtype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Categorysubtype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Categorysubtype|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Categorysubtype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Categorysubtype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Categorysubtype findOrCreate($search, callable $callback = null, $options = [])
 */
class CategorysubtypesTable extends Table
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

        $this->setTable('categorysubtypes');
        $this->setDisplayField('categorysubtypename');
        $this->setPrimaryKey('id');
         $this->hasMany('Properties', [
            'foreignKey' => 'categorysubtypes_id'
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
            ->scalar('categorysubtypename')
            ->requirePresence('categorysubtypename', 'create')
            ->notEmpty('categorysubtypename');

        return $validator;
    }
}
