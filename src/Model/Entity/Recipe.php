<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Recipe Entity
 *
 * @property int $id
 * @property int $users_id
 * @property string $name
 * @property string $photo
 * @property string $photo_dir
 * @property string $photo2
 * @property string $photo2_dir
 * @property string $photo3
 * @property string $photo3_dir
 * @property string $photo4
 * @property string $photo4_dir
 * @property string $ingredient
 * @property string $step
 * @property int $category_id
 * @property int $status
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Category $category
 */
class Recipe extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'users_id' => true,
        'name' => true,
        'photo' => true,
        'photo_dir' => true,
        'photo2' => true,
        'photo2_dir' => true,
        'photo3' => true,
        'photo3_dir' => true,
        'photo4' => true,
        'photo4_dir' => true,
        'ingredient' => true,
        'step' => true,
        'category_id' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'category' => true,
    ];
}
