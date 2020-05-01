<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PartenaireRepository")
 */
class Partenaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $id_partenaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_partenaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="partenaires")
     */
    private $user;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPartenaire(): ?string
    {
        return $this->id_partenaire;
    }

    public function setIdPartenaire(string $id_partenaire): self
    {
        $this->id_partenaire = $id_partenaire;

        return $this;
    }

    public function getNomPartenaire(): ?string
    {
        return $this->nom_partenaire;
    }

    public function setNomPartenaire(string $nom_partenaire): self
    {
        $this->nom_partenaire = $nom_partenaire;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

   
}
