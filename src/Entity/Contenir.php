<?php

namespace App\Entity;

use App\Repository\ContenirRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContenirRepository::class)]
class Contenir
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Campagne>
     */
    #[ORM\ManyToMany(targetEntity: Campagne::class, inversedBy: 'contenirs')]
    private Collection $campagne;

    /**
     * @var Collection<int, Membre>
     */
    #[ORM\ManyToMany(targetEntity: Membre::class, inversedBy: 'contenirs')]
    private Collection $membre;

    public function __construct()
    {
        $this->campagne = new ArrayCollection();
        $this->membre = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Campagne>
     */
    public function getCampagne(): Collection
    {
        return $this->campagne;
    }

    public function addCampagne(Campagne $campagne): static
    {
        if (!$this->campagne->contains($campagne)) {
            $this->campagne->add($campagne);
        }

        return $this;
    }

    public function removeCampagne(Campagne $campagne): static
    {
        $this->campagne->removeElement($campagne);

        return $this;
    }

    /**
     * @return Collection<int, Membre>
     */
    public function getMembre(): Collection
    {
        return $this->membre;
    }

    public function addMembre(Membre $membre): static
    {
        if (!$this->membre->contains($membre)) {
            $this->membre->add($membre);
        }

        return $this;
    }

    public function removeMembre(Membre $membre): static
    {
        $this->membre->removeElement($membre);

        return $this;
    }
}
