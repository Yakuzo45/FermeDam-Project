<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SeasonsRepository")
 */
class Seasons
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
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Colis", mappedBy="seasons")
     */
    private $colis;

    public function __construct()
    {
        $this->colis = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Colis[]
     */
    public function getColis(): Collection
    {
        return $this->colis;
    }

    public function addColi(Colis $coli): self
    {
        if (!$this->colis->contains($coli)) {
            $this->colis[] = $coli;
            $coli->addSeason($this);
        }

        return $this;
    }

    public function removeColi(Colis $coli): self
    {
        if ($this->colis->contains($coli)) {
            $this->colis->removeElement($coli);
            $coli->removeSeason($this);
        }

        return $this;
    }
}
