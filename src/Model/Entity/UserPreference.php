<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserPreference Entity.
 *
 * @property float $id
 * @property float $user_id
 * @property \App\Model\Entity\User $user
 * @property string $name
 * @property string $item_supply_border_color
 * @property float $item_supply_border_thickness
 * @property string $item_demand_border_color
 * @property float $item_demand_border_thickness
 */
class UserPreference extends Entity
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
        '*' => true,
        'id' => false,
    ];
}
