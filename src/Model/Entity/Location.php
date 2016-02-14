<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Location Entity.
 *
 * @property float $id
 * @property float $user_id
 * @property \App\Model\Entity\User $user
 * @property string $name
 * @property float $region_id
 * @property \App\Model\Entity\Region $region
 * @property string $icon
 * @property float $icon_display_size
 * @property float $pct_ns
 * @property float $pct_we
 * @property bool $waypoint
 * @property float $parent_id
 * @property \App\Model\Entity\Location $parent_location
 * @property float $lft
 * @property float $rght
 * @property \App\Model\Entity\Distribution[] $distributions
 * @property \App\Model\Entity\LocationInventory[] $location_inventories
 * @property \App\Model\Entity\Location[] $child_locations
 * @property \App\Model\Entity\Route[] $routes
 * @property \App\Model\Entity\Step[] $steps
 * @property \App\Model\Entity\Transfer[] $transfers
 * @property \App\Model\Entity\Warehouse[] $warehouses
 */
class Location extends Entity
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
