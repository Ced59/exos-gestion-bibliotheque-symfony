<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MotsClesRepository")
 */
class MotsCles
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
    private $mot;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Ouvrages", mappedBy="Indexing")
     */
    private $ouvrages;

    public function __construct()
    {
        $this->ouvrages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMot(): ?string
    {
        return $this->mot;
    }

    public function setMot(string $mot): self
    {
        $this->mot = $mot;

        return $this;
    }

    /**
     * @return Collection|Ouvrages[]
     */
    public function getOuvrages(): Collection
    {
        return $this->ouvrages;
    }

    public function addOuvrage(Ouvrages $ouvrage): self
    {
        if (!$this->ouvrages->contains($ouvrage)) {
            $this->ouvrages[] = $ouvrage;
            $ouvrage->addIndexing($this);
        }

        return $this;
    }

    public function removeOuvrage(Ouvrages $ouvrage): self
    {
        if ($this->ouvrages->contains($ouvrage)) {
            $this->ouvrages->removeElement($ouvrage);
            $ouvrage->removeIndexing($this);
        }

        return $this;
    }
}
