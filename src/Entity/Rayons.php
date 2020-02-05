<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RayonsRepository")
 */
class Rayons
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
    private $intitule_rayon;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ouvrages", inversedBy="contient")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ouvrages;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntituleRayon(): ?string
    {
        return $this->intitule_rayon;
    }

    public function setIntituleRayon(string $intitule_rayon): self
    {
        $this->intitule_rayon = $intitule_rayon;

        return $this;
    }

    public function getOuvrages(): ?Ouvrages
    {
        return $this->ouvrages;
    }

    public function setOuvrages(?Ouvrages $ouvrages): self
    {
        $this->ouvrages = $ouvrages;

        return $this;
    }
}
