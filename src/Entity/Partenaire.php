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
     * @ORM\OneToMany(targetEntity="App\Entity\patient", mappedBy="partenaire")
     */
    private $concevoir;

    public function __construct()
    {
        $this->concevoir = new ArrayCollection();
    }

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

    /**
     * @return Collection|patient[]
     */
    public function getConcevoir(): Collection
    {
        return $this->concevoir;
    }

    public function addConcevoir(patient $concevoir): self
    {
        if (!$this->concevoir->contains($concevoir)) {
            $this->concevoir[] = $concevoir;
            $concevoir->setPartenaire($this);
        }

        return $this;
    }

    public function removeConcevoir(patient $concevoir): self
    {
        if ($this->concevoir->contains($concevoir)) {
            $this->concevoir->removeElement($concevoir);
            // set the owning side to null (unless already changed)
            if ($concevoir->getPartenaire() === $this) {
                $concevoir->setPartenaire(null);
            }
        }

        return $this;
    }
}
