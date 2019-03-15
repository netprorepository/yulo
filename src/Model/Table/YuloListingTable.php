<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * YuloListing Model
 *
 * @property \App\Model\Table\ListingsTable|\Cake\ORM\Association\BelongsTo $Listings
 *
 * @method \App\Model\Entity\YuloListing get($primaryKey, $options = [])
 * @method \App\Model\Entity\YuloListing newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\YuloListing[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\YuloListing|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\YuloListing patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\YuloListing[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\YuloListing findOrCreate($search, callable $callback = null, $options = [])
 */
class YuloListingTable extends Table
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

        $this->setTable('yulo_listing');
        $this->setDisplayField('listing_id');
        $this->setPrimaryKey('listing_id');

        $this->belongsTo('Listings', [
            'foreignKey' => 'listing_id',
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
            ->scalar('listing_title')
            ->requirePresence('listing_title', 'create')
            ->notEmpty('listing_title');

        $validator
            ->integer('listing_display_status')
            ->requirePresence('listing_display_status', 'create')
            ->notEmpty('listing_display_status');

        $validator
            ->integer('listing_market_status')
            ->requirePresence('listing_market_status', 'create')
            ->notEmpty('listing_market_status');

        $validator
            ->integer('listing_category')
            ->requirePresence('listing_category', 'create')
            ->notEmpty('listing_category');

        $validator
            ->integer('listing_type')
            ->requirePresence('listing_type', 'create')
            ->notEmpty('listing_type');

        $validator
            ->integer('listing_sub_type')
            ->requirePresence('listing_sub_type', 'create')
            ->notEmpty('listing_sub_type');

        $validator
            ->decimal('listing_price')
            ->allowEmpty('listing_price');

        $validator
            ->decimal('listing_square_area')
            ->allowEmpty('listing_square_area');

        $validator
            ->integer('listing_rooms')
            ->allowEmpty('listing_rooms');

        $validator
            ->scalar('listing_address')
            ->allowEmpty('listing_address');

        $validator
            ->integer('listing_state')
            ->allowEmpty('listing_state');

        $validator
            ->integer('listing_city')
            ->allowEmpty('listing_city');

        $validator
            ->scalar('listing_area')
            ->allowEmpty('listing_area');

        $validator
            ->scalar('listing_zip')
            ->allowEmpty('listing_zip');

        $validator
            ->scalar('listing_age')
            ->allowEmpty('listing_age');

        $validator
            ->integer('listing_bedrooms')
            ->allowEmpty('listing_bedrooms');

        $validator
            ->integer('listing_bathrooms')
            ->allowEmpty('listing_bathrooms');

        $validator
            ->integer('listing_parking')
            ->allowEmpty('listing_parking');

        $validator
            ->integer('listing_toilet')
            ->allowEmpty('listing_toilet');

        $validator
            ->scalar('listing_description')
            ->allowEmpty('listing_description');

        $validator
            ->scalar('listing_video_link')
            ->allowEmpty('listing_video_link');

        $validator
            ->integer('listing_service_status')
            ->allowEmpty('listing_service_status');

        $validator
            ->scalar('listing_images')
            ->allowEmpty('listing_images');

        $validator
            ->scalar('listing_other_features')
            ->allowEmpty('listing_other_features');

        $validator
            ->scalar('listing_agent')
            ->allowEmpty('listing_agent');

        $validator
            ->dateTime('listing_date_added')
            ->allowEmpty('listing_date_added');

        $validator
            ->integer('listing_premium')
            ->requirePresence('listing_premium', 'create')
            ->notEmpty('listing_premium');

        $validator
            ->scalar('listing_category_name')
            ->allowEmpty('listing_category_name');

        $validator
            ->scalar('listing_city_name')
            ->allowEmpty('listing_city_name');

        $validator
            ->scalar('listing_state_name')
            ->allowEmpty('listing_state_name');

        $validator
            ->integer('listing_status')
            ->requirePresence('listing_status', 'create')
            ->notEmpty('listing_status');

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
        $rules->add($rules->existsIn(['listing_id'], 'Listings'));

        return $rules;
    }
}
