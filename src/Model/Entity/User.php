<?php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property int $fullname
 * @property string $email
 * @property string $password
 * @property string $phone
 * @property bool $is_active
 * @property string|null $ip
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $avatar
 *
 * @property \App\Model\Entity\Post[] $posts
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     * true means fields allow to insert mass
     * 
     * @var array
     */
    protected $_accessible = [
        'fullname' => true,
        'email' => true,
        'password' => true,
        'phone' => true,
        'is_active' => true,
        'ip' => true,
        'created' => true,
        'modified' => true,
        'avatar' => true,
        'posts' => true
    ];
    

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
