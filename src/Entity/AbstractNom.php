<?php

namespace App\Entity;

use App\Repository\AbstractNomRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AbstractNomRepository::class)]
#[ORM\MappedSuperclass]
abstract class AbstractNom
{

    #[ORM\Column(length: 255)]
    protected ?string $nom = null;

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }
}
