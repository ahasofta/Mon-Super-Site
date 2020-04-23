<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PatientRepository")
 */
class Patient
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_unique_rdz;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_patient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom_patient;

    /**
     * @ORM\Column(type="date")
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mutuelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $date_rdz;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $quartier;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\medecin", inversedBy="patients")
     */
    private $consulter;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partenaire", inversedBy="concevoir")
     */
    private $partenaire;

    public function __construct()
    {
        $this->consulter = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumUniqueRdz(): ?int
    {
        return $this->num_unique_rdz;
    }

    public function setNumUniqueRdz(int $num_unique_rdz): self
    {
        $this->num_unique_rdz = $num_unique_rdz;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getNomPatient(): ?string
    {
        return $this->nom_patient;
    }

    public function setNomPatient(string $nom_patient): self
    {
        $this->nom_patient = $nom_patient;

        return $this;
    }

    public function getPrenomPatient(): ?string
    {
        return $this->prenom_patient;
    }

    public function setPrenomPatient(string $prenom_patient): self
    {
        $this->prenom_patient = $prenom_patient;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getMutuelle(): ?string
    {
        return $this->mutuelle;
    }

    public function setMutuelle(string $mutuelle): self
    {
        $this->mutuelle = $mutuelle;

        return $this;
    }

    public function getDateRdz(): ?string
    {
        return $this->date_rdz;
    }

    public function setDateRdz(string $date_rdz): self
    {
        $this->date_rdz = $date_rdz;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getQuartier(): ?string
    {
        return $this->quartier;
    }

    public function setQuartier(string $quartier): self
    {
        $this->quartier = $quartier;

        return $this;
    }

    /**
     * @return Collection|medecin[]
     */
    public function getConsulter(): Collection
    {
        return $this->consulter;
    }

    public function addConsulter(medecin $consulter): self
    {
        if (!$this->consulter->contains($consulter)) {
            $this->consulter[] = $consulter;
        }

        return $this;
    }

    public function removeConsulter(medecin $consulter): self
    {
        if ($this->consulter->contains($consulter)) {
            $this->consulter->removeElement($consulter);
        }

        return $this;
    }

    public function getPartenaire(): ?Partenaire
    {
        return $this->partenaire;
    }

    public function setPartenaire(?Partenaire $partenaire): self
    {
        $this->partenaire = $partenaire;

        return $this;
    }
}
