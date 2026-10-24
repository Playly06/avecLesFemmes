<?php

namespace App\Entity;

use App\Repository\ContenirRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContenirRepository::class)]
class Contenir
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomCampagne = null;

    #[ORM\Column(length: 255)]
    private ?string $nomMembre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCampagne(): ?string
    {
        return $this->nomCampagne;
    }

    public function setNomCampagne(string $nomCampagne): static
    {
        $this->nomCampagne = $nomCampagne;

        return $this;
    }

    public function getNomMembre(): ?string
    {
        return $this->nomMembre;
    }

    public function setNomMembre(string $nomMembre): static
    {
        $this->nomMembre = $nomMembre;

        return $this;
    }
}
