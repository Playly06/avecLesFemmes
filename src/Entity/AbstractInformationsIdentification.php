<?php

namespace App\Entity;

use App\Repository\AbstractInformationsIdentificationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AbstractInformationsIdentificationRepository::class)]
class AbstractInformationsIdentification extends AbstractNom
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    protected ?string $nom = null;

    #[ORM\Column(length: 255)]
    protected ?string $telephone = null;

    #[ORM\Column(length: 255)]
    protected ?string $addresse = null;

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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAddresse(): ?string
    {
        return $this->addresse;
    }

    public function setAddresse(string $addresse): static
    {
        $this->addresse = $addresse;

        return $this;
    }
}
