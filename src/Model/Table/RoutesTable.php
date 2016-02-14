<?php
namespace App\Model\Table;

use App\Model\Entity\Route;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Routes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Regions
 * @property \Cake\ORM\Association\BelongsTo $Locations
 * @property \Cake\ORM\Association\HasMany $RouteInventories
 * @property \Cake\ORM\Association\HasMany $Steps
 * @property \Cake\ORM\Association\BelongsToMany $Transports
 */
class RoutesTable extends Table
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

        $this->table('routes');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Regions', [
            'foreignKey' => 'region_id'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('RouteInventories', [
            'foreignKey' => 'route_id'
        ]);
        $this->hasMany('Steps', [
            'foreignKey' => 'route_id'
        ]);
        $this->belongsToMany('Transports', [
            'foreignKey' => 'route_id',
            'targetForeignKey' => 'transport_id',
            'joinTable' => 'routes_transports'
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
            ->numeric('step')
            ->allowEmpty('step');

        $validator
            ->numeric('pct_ns')
            ->allowEmpty('pct_ns');

        $validator
            ->numeric('pct_we')
            ->allowEmpty('pct_we');

        $validator
            ->allowEmpty('icon');

        $validator
            ->numeric('icon_display_size')
            ->allowEmpty('icon_display_size');

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
        $rules->add($rules->existsIn(['location_id'], 'Locations'));
        return $rules;
    }
}
