<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RoutesTransport Entity.
 *
 * @property float $id
 * @property float $user_id
 * @property \App\Model\Entity\User $user
 * @property float $route_id
 * @property \App\Model\Entity\Route $route
 * @property float $transport_id
 * @property \App\Model\Entity\Transport $transport
 * @property float $quantity
 */
class RoutesTransport extends Entity
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
