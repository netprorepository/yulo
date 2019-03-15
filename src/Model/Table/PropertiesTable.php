<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Properties Model
 *
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsTo $Categories
 * @property |\Cake\ORM\Association\BelongsTo $Categorytypes
 * @property |\Cake\ORM\Association\BelongsTo $Categorysubtypes
 * @property \App\Model\Table\StatesTable|\Cake\ORM\Association\BelongsTo $States
 * @property \App\Model\Table\CitiesTable|\Cake\ORM\Association\BelongsTo $Cities
 * @property \App\Model\Table\AgentsTable|\Cake\ORM\Association\BelongsTo $Agents
 * @property \App\Model\Table\ImagesTable|\Cake\ORM\Association\HasMany $Images
 * @property \App\Model\Table\ImagesTable|\Cake\ORM\Association\BelongsToMany $Images
 *
 * @method \App\Model\Entity\Property get($primaryKey, $options = [])
 * @method \App\Model\Entity\Property newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Property[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Property|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Property patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Property[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Property findOrCreate($search, callable $callback = null, $options = [])
 */
class PropertiesTable extends Table
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

        $this->setTable('properties');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Categorytypes', [
            'foreignKey' => 'categorytype_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Categorysubtypes', [
            'foreignKey' => 'categorysubtype_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('States', [
            'foreignKey' => 'state_id'
        ]);
        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id'
        ]);
        $this->belongsTo('Agents', [
            'foreignKey' => 'agent_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Images', [
            'foreignKey' => 'property_id',
            'joinType' => 'INNER'
        ]);
//        $this->belongsToMany('Images', [
//            'foreignKey' => 'property_id',
//            'targetForeignKey' => 'image_id',
//            'joinTable' => 'images_properties'
//        ]);
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

//        $validator
//            ->scalar('listing_title')
//            ->requirePresence('listing_title', 'create')
//            ->notEmpty('listing_title');
//
//        $validator
//            ->scalar('listing_display_status')
//            ->requirePresence('listing_display_status', 'create')
//            ->notEmpty('listing_display_status');
//
//        $validator
//            ->scalar('listing_market_status')
//            ->requirePresence('listing_market_status', 'create')
//            ->notEmpty('listing_market_status');
//
//        $validator
//            ->scalar('listing_price')
//            ->allowEmpty('listing_price');
//
//        $validator
//            ->scalar('listing_square_area')
//            ->allowEmpty('listing_square_area');
//
//        $validator
//            ->integer('listing_rooms')
//            ->allowEmpty('listing_rooms');
//
//        $validator
//            ->scalar('listing_address')
//            ->allowEmpty('listing_address');
//
//        $validator
//            ->scalar('listing_area')
//            ->allowEmpty('listing_area');
//
//        $validator
//            ->scalar('listing_zip')
//            ->allowEmpty('listing_zip');
//
//        $validator
//            ->scalar('listing_age')
//            ->allowEmpty('listing_age');
//
//        $validator
//            ->integer('listing_bedrooms')
//            ->allowEmpty('listing_bedrooms');
//
//        $validator
//            ->integer('listing_bathrooms')
//            ->allowEmpty('listing_bathrooms');
//
//        $validator
//            ->integer('listing_parking')
//            ->allowEmpty('listing_parking');
//
//        $validator
//            ->integer('listing_toilet')
//            ->allowEmpty('listing_toilet');
//
//        $validator
//            ->scalar('listing_description')
//            ->allowEmpty('listing_description');
//
//        $validator
//            ->scalar('listing_video_link')
//            ->allowEmpty('listing_video_link');
//
//        $validator
//            ->integer('listing_service_status')
//            ->allowEmpty('listing_service_status');
//
//        $validator
//            ->scalar('listing_images')
//            ->allowEmpty('listing_images');
//
//        $validator
//            ->scalar('listing_other_features')
//            ->allowEmpty('listing_other_features');
//
//        $validator
//            ->dateTime('listing_date_added')
//            ->allowEmpty('listing_date_added');
//
//        $validator
//            ->integer('listing_premium')
//            ->requirePresence('listing_premium', 'create')
//            ->notEmpty('listing_premium');
//
//        $validator
//            ->scalar('listing_status')
//            ->requirePresence('listing_status', 'create')
//            ->notEmpty('listing_status');

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
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['categorytype_id'], 'Categorytypes'));
        $rules->add($rules->existsIn(['categorysubtype_id'], 'Categorysubtypes'));
        $rules->add($rules->existsIn(['state_id'], 'States'));
        $rules->add($rules->existsIn(['city_id'], 'Cities'));
        $rules->add($rules->existsIn(['agent_id'], 'Agents'));

        return $rules;
    }
}
