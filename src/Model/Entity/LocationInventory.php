<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LocationInventory Entity.
 *
 * @property float $id
 * @property float $user_id
 * @property \App\Model\Entity\User $user
 * @property float $location_id
 * @property \App\Model\Entity\Location $location
 * @property float $item_id
 * @property \App\Model\Entity\Item $item
 * @property float $grade_id
 * @property \App\Model\Entity\Grade $grade
 * @property float $quantity
 * @property float $value
 */
class LocationInventory extends Entity
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
