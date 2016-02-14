<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\HasMany $Distributions
 * @property \Cake\ORM\Association\HasMany $Grades
 * @property \Cake\ORM\Association\HasMany $Items
 * @property \Cake\ORM\Association\HasMany $LocationInventories
 * @property \Cake\ORM\Association\HasMany $Locations
 * @property \Cake\ORM\Association\HasMany $Regions
 * @property \Cake\ORM\Association\HasMany $RouteInventories
 * @property \Cake\ORM\Association\HasMany $Routes
 * @property \Cake\ORM\Association\HasMany $RoutesTransports
 * @property \Cake\ORM\Association\HasMany $Steps
 * @property \Cake\ORM\Association\HasMany $Transfers
 * @property \Cake\ORM\Association\HasMany $Transports
 * @property \Cake\ORM\Association\HasMany $Types
 * @property \Cake\ORM\Association\HasMany $UserPreferences
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

        $this->table('users');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Distributions', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Grades', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Items', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('LocationInventories', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Locations', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Regions', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('RouteInventories', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Routes', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('RoutesTransports', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Steps', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Transfers', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Transports', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Types', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserPreferences', [
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
            ->numeric('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('name');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->allowEmpty('password');

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
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
}
