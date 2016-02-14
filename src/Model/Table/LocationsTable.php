<?php
namespace App\Model\Table;

use App\Model\Entity\Location;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Locations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Regions
 * @property \Cake\ORM\Association\BelongsTo $ParentLocations
 * @property \Cake\ORM\Association\HasMany $Distributions
 * @property \Cake\ORM\Association\HasMany $LocationInventories
 * @property \Cake\ORM\Association\HasMany $ChildLocations
 * @property \Cake\ORM\Association\HasMany $Routes
 * @property \Cake\ORM\Association\HasMany $Steps
 * @property \Cake\ORM\Association\HasMany $Transfers
 * @property \Cake\ORM\Association\HasMany $Warehouses
 */
class LocationsTable extends Table
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

		$this->addBehavior('Tree');

        $this->table('locations');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Regions', [
            'foreignKey' => 'region_id'
        ]);
        $this->belongsTo('ParentLocations', [
            'className' => 'Locations',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Distributions', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('LocationInventories', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('ChildLocations', [
            'className' => 'Locations',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Routes', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('Steps', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('Transfers', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('Warehouses', [
            'foreignKey' => 'location_id'
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
            ->numeric('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('name');

        $validator
            ->allowEmpty('icon');

        $validator
            ->numeric('icon_display_size')
            ->allowEmpty('icon_display_size');

        $validator
            ->numeric('pct_ns')
            ->allowEmpty('pct_ns');

        $validator
            ->numeric('pct_we')
            ->allowEmpty('pct_we');

        $validator
            ->boolean('waypoint')
            ->allowEmpty('waypoint');

        $validator
            ->numeric('lft')
            ->allowEmpty('lft');

        $validator
            ->numeric('rght')
            ->allowEmpty('rght');

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
        $rules->add($rules->existsIn(['region_id'], 'Regions'));
        $rules->add($rules->existsIn(['parent_id'], 'ParentLocations'));
        return $rules;
    }
}
