<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExemplairesRepository")
 */
class Exemplaires
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ouvrages", inversedBy="Represent")
     */
    private $ouvrages;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bibliotheques", mappedBy="exemplaires")
     */
    private $Detient;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Adherents", inversedBy="exemplaires")
     */
    private $Emprunte;

    public function __construct()
    {
        $this->Detient = new ArrayCollection();
        $this->Emprunte = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|Bibliotheques[]
     */
    public function getDetient(): Collection
    {
        return $this->Detient;
    }

    public function addDetient(Bibliotheques $detient): self
    {
        if (!$this->Detient->contains($detient)) {
            $this->Detient[] = $detient;
            $detient->setExemplaires($this);
        }

        return $this;
    }

    public function removeDetient(Bibliotheques $detient): self
    {
        if ($this->Detient->contains($detient)) {
            $this->Detient->removeElement($detient);
            // set the owning side to null (unless already changed)
            if ($detient->getExemplaires() === $this) {
                $detient->setExemplaires(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Adherents[]
     */
    public function getEmprunte(): Collection
    {
        return $this->Emprunte;
    }

    public function addEmprunte(Adherents $emprunte): self
    {
        if (!$this->Emprunte->contains($emprunte)) {
            $this->Emprunte[] = $emprunte;
        }

        return $this;
    }

    public function removeEmprunte(Adherents $emprunte): self
    {
        if ($this->Emprunte->contains($emprunte)) {
            $this->Emprunte->removeElement($emprunte);
        }

        return $this;
    }
}
