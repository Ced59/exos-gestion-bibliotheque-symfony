<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OuvragesRepository")
 */
class Ouvrages
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $titre;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Rayons", mappedBy="ouvrages", orphanRemoval=true)
     */
    private $contient;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Auteurs", inversedBy="ouvrages")
     */
    private $isAuteur;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\MotsCles", inversedBy="ouvrages")
     */
    private $Indexing;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Exemplaires", mappedBy="ouvrages")
     */
    private $Represent;

    public function __construct()
    {
        $this->contient = new ArrayCollection();
        $this->isAuteur = new ArrayCollection();
        $this->Indexing = new ArrayCollection();
        $this->Represent = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * @return Collection|Rayons[]
     */
    public function getContient(): Collection
    {
        return $this->contient;
    }

    public function addContient(Rayons $contient): self
    {
        if (!$this->contient->contains($contient)) {
            $this->contient[] = $contient;
            $contient->setOuvrages($this);
        }

        return $this;
    }

    public function removeContient(Rayons $contient): self
    {
        if ($this->contient->contains($contient)) {
            $this->contient->removeElement($contient);
            // set the owning side to null (unless already changed)
            if ($contient->getOuvrages() === $this) {
                $contient->setOuvrages(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Auteurs[]
     */
    public function getIsAuteur(): Collection
    {
        return $this->isAuteur;
    }

    public function addIsAuteur(Auteurs $isAuteur): self
    {
        if (!$this->isAuteur->contains($isAuteur)) {
            $this->isAuteur[] = $isAuteur;
        }

        return $this;
    }

    public function removeIsAuteur(Auteurs $isAuteur): self
    {
        if ($this->isAuteur->contains($isAuteur)) {
            $this->isAuteur->removeElement($isAuteur);
        }

        return $this;
    }

    /**
     * @return Collection|MotsCles[]
     */
    public function getIndexing(): Collection
    {
        return $this->Indexing;
    }

    public function addIndexing(MotsCles $indexing): self
    {
        if (!$this->Indexing->contains($indexing)) {
            $this->Indexing[] = $indexing;
        }

        return $this;
    }

    public function removeIndexing(MotsCles $indexing): self
    {
        if ($this->Indexing->contains($indexing)) {
            $this->Indexing->removeElement($indexing);
        }

        return $this;
    }

    /**
     * @return Collection|Exemplaires[]
     */
    public function getRepresent(): Collection
    {
        return $this->Represent;
    }

    public function addRepresent(Exemplaires $represent): self
    {
        if (!$this->Represent->contains($represent)) {
            $this->Represent[] = $represent;
            $represent->setOuvrages($this);
        }

        return $this;
    }

    public function removeRepresent(Exemplaires $represent): self
    {
        if ($this->Represent->contains($represent)) {
            $this->Represent->removeElement($represent);
            // set the owning side to null (unless already changed)
            if ($represent->getOuvrages() === $this) {
                $represent->setOuvrages(null);
            }
        }

        return $this;
    }
}
