<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Route Entity.
 *
 * @property float $id
 * @property float $user_id
 * @property \App\Model\Entity\User $user
 * @property string $name
 * @property float $step
 * @property float $region_id
 * @property \App\Model\Entity\Region $region
 * @property float $location_id
 * @property \App\Model\Entity\Location $location
 * @property float $pct_ns
 * @property float $pct_we
 * @property string $icon
 * @property float $icon_display_size
 * @property \App\Model\Entity\RouteInventory[] $route_inventories
 * @property \App\Model\Entity\Step[] $steps
 * @property \App\Model\Entity\Transport[] $transports
 */
class Route extends Entity
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
