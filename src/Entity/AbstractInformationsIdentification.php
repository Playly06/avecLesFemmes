<?php

namespace App\Entity;

use App\Repository\AbstractInformationsIdentificationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AbstractInformationsIdentificationRepository::class)]
#[ORM\MappedSuperclass]
class AbstractInformationsIdentification extends AbstractNom
{
    #[ORM\Column(length: 255)]
    protected ?string $telephone = null;

    #[ORM\Column(length: 255)]
    protected ?string $addresse = null;
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
