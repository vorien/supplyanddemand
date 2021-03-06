<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transport Entity.
 *
 * @property float $id
 * @property float $user_id
 * @property \App\Model\Entity\User $user
 * @property string $name
 * @property string $icon
 * @property float $icon_display_size
 * @property float $volume
 * @property float $speed
 * @property \App\Model\Entity\Route[] $routes
 */
class Transport extends Entity
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
