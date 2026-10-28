<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRepository::class)]
class Type
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    /**
     * @var Collection<int, Campagne>
     */
    #[ORM\OneToMany(targetEntity: Campagne::class, mappedBy: 'type')]
    private Collection $campages;

    public function __construct()
    {
        $this->campages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Campagne>
     */
    public function getCampages(): Collection
    {
        return $this->campages;
    }

    public function addCampage(Campagne $campage): static
    {
        if (!$this->campages->contains($campage)) {
            $this->campages->add($campage);
            $campage->setType($this);
        }

        return $this;
    }

    public function removeCampage(Campagne $campage): static
    {
        if ($this->campages->removeElement($campage)) {
            // set the owning side to null (unless already changed)
            if ($campage->getType() === $this) {
                $campage->setType(null);
            }
        }

        return $this;
    }
}
