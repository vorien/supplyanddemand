<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RouteInventory Entity.
 *
 * @property float $id
 * @property float $user_id
 * @property \App\Model\Entity\User $user
 * @property float $route_id
 * @property \App\Model\Entity\Route $route
 * @property float $item_id
 * @property \App\Model\Entity\Item $item
 * @property float $grade_id
 * @property \App\Model\Entity\Grade $grade
 * @property float $quantity
 * @property float $value
 */
class RouteInventory extends Entity
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
