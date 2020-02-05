<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BibliothequesRepository")
 */
class Bibliotheques
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
    private $nom_biblio;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $adresse_biblio;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Exemplaires", inversedBy="Detient")
     */
    private $exemplaires;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomBiblio(): ?string
    {
        return $this->nom_biblio;
    }

    public function setNomBiblio(string $nom_biblio): self
    {
        $this->nom_biblio = $nom_biblio;

        return $this;
    }

    public function getAdresseBiblio(): ?string
    {
        return $this->adresse_biblio;
    }

    public function setAdresseBiblio(string $adresse_biblio): self
    {
        $this->adresse_biblio = $adresse_biblio;

        return $this;
    }

    public function getExemplaires(): ?Exemplaires
    {
        return $this->exemplaires;
    }

    public function setExemplaires(?Exemplaires $exemplaires): self
    {
        $this->exemplaires = $exemplaires;

        return $this;
    }
}
