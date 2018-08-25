<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Personality Entity
 *
 * @property int $id
 * @property string $name
 * @property string $actor
 * @property string $sample
 * @property string $path
 *
 * @property \App\Model\Entity\Voice[] $voices
 */
class Personality extends Entity
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
        'name' => true,
        'actor' => true,
        'sample' => true,
        'path' => true,
        'voices' => true
    ];
}
