<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity.
 *
 * @property float $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property \App\Model\Entity\Distribution[] $distributions
 * @property \App\Model\Entity\Grade[] $grades
 * @property \App\Model\Entity\Item[] $items
 * @property \App\Model\Entity\LocationInventory[] $location_inventories
 * @property \App\Model\Entity\Location[] $locations
 * @property \App\Model\Entity\Region[] $regions
 * @property \App\Model\Entity\RouteInventory[] $route_inventories
 * @property \App\Model\Entity\Route[] $routes
 * @property \App\Model\Entity\RoutesTransport[] $routes_transports
 * @property \App\Model\Entity\Step[] $steps
 * @property \App\Model\Entity\Transfer[] $transfers
 * @property \App\Model\Entity\Transport[] $transports
 * @property \App\Model\Entity\Type[] $types
 * @property \App\Model\Entity\Warehouse[] $warehouses
 */
class User extends Entity
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

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
