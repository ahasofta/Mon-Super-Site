<?php
// src/Entity/User.php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

     /**
     * Set choiceroles
     * @param string $choiceroles
     * @return User
     */
    public function setChoiceroles($choiceroles)
    {
        foreach ($this->getRoles() as $role) {
            $this->removeRole($role);
        }
        
        $this->addRole($choiceroles);

        return $this;
    }

    /**
     * Get choiceroles
     * @return string
     */
    public function getChoiceroles()
    {
        return $this->getRoles()[0];
    }

}