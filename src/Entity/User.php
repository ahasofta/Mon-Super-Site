<?php
// src/Entity/User.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Partenaire", mappedBy="user")
     */
    private $partenaires;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Medecin", mappedBy="user")
     */
    private $medecins;

    public function __construct()
    {
        parent::__construct();
        // your own logic

        $this->partenaires = new ArrayCollection();
        $this->medecins = new ArrayCollection();    }

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

    /**
     * @return Collection|Partenaire[]
     */
    public function getPartenaires(): Collection
    {
        return $this->partenaires;
    }

    public function addPartenaire(Partenaire $partenaire): self
    {
        if (!$this->partenaires->contains($partenaire)) {
            $this->partenaires[] = $partenaire;
            $partenaire->setUsers($this);
        }

        return $this;
    }

    public function removePartenaire(Partenaire $partenaire): self
    {
        if ($this->partenaires->contains($partenaire)) {
            $this->partenaires->removeElement($partenaire);
            // set the owning side to null (unless already changed)
            if ($partenaire->getUsers() === $this) {
                $partenaire->setUsers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Medecin[]
     */
    public function getMedecins(): Collection
    {
        return $this->medecins;
    }

    public function addMedecin(Medecin $medecin): self
    {
        if (!$this->medecins->contains($medecin)) {
            $this->medecins[] = $medecin;
            $medecin->setUser($this);
        }

        return $this;
    }

    public function removeMedecin(Medecin $medecin): self
    {
        if ($this->medecins->contains($medecin)) {
            $this->medecins->removeElement($medecin);
            // set the owning side to null (unless already changed)
            if ($medecin->getUser() === $this) {
                $medecin->setUser(null);
            }
        }

        return $this;
    }

}