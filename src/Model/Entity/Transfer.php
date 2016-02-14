<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transfer Entity.
 *
 * @property float $id
 * @property float $user_id
 * @property \App\Model\Entity\User $user
 * @property float $step_id
 * @property \App\Model\Entity\Step $step
 * @property float $location_id
 * @property \App\Model\Entity\Location $location
 * @property float $item_id
 * @property \App\Model\Entity\Item $item
 * @property float $grade_id
 * @property \App\Model\Entity\Grade $grade
 * @property float $quantity
 * @property bool $load_unload
 */
class Transfer extends Entity
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
