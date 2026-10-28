<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Contenir;
use App\Entity\Campagne;
use App\Entity\Membre;
class ContenirFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $contenir = new Contenir();
        $campagne = $this->getReference(CampagneFixture::CAMPAGNE_REFERENCE,Campagne::class);
        $contenir->setCampagne($campagne);
        $membre = $this->getReference(MembreFixture::MEMBRE_REFERENCE,Membre::class);
        $contenir->setMembre($membre);

        $manager->persist($contenir);
        $manager->flush();
    }

    public function getDependencies():array{
        return[
            MembreFixture::class
        ];
    }
}
