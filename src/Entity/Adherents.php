<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdherentsRepository")
 */
class Adherents
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
    private $nom_adherent;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom_adherent;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $adresse_adherent;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Exemplaires", mappedBy="Emprunte")
     */
    private $exemplaires;

    public function __construct()
    {
        $this->exemplaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAdherent(): ?string
    {
        return $this->nom_adherent;
    }

    public function setNomAdherent(string $nom_adherent): self
    {
        $this->nom_adherent = $nom_adherent;

        return $this;
    }

    public function getPrenomAdherent(): ?string
    {
        return $this->prenom_adherent;
    }

    public function setPrenomAdherent(string $prenom_adherent): self
    {
        $this->prenom_adherent = $prenom_adherent;

        return $this;
    }

    public function getAdresseAdherent(): ?string
    {
        return $this->adresse_adherent;
    }

    public function setAdresseAdherent(string $adresse_adherent): self
    {
        $this->adresse_adherent = $adresse_adherent;

        return $this;
    }

    /**
     * @return Collection|Exemplaires[]
     */
    public function getExemplaires(): Collection
    {
        return $this->exemplaires;
    }

    public function addExemplaire(Exemplaires $exemplaire): self
    {
        if (!$this->exemplaires->contains($exemplaire)) {
            $this->exemplaires[] = $exemplaire;
            $exemplaire->addEmprunte($this);
        }

        return $this;
    }

    public function removeExemplaire(Exemplaires $exemplaire): self
    {
        if ($this->exemplaires->contains($exemplaire)) {
            $this->exemplaires->removeElement($exemplaire);
            $exemplaire->removeEmprunte($this);
        }

        return $this;
    }
}
