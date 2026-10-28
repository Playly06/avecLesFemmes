<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Campagne;
use App\Entity\Type;
use App\Entity\Groupement;
class CampagneFixture extends Fixture implements DependentFixtureInterface
{
    public const CAMPAGNE_REFERENCE='campagne-noël';
    public function load(ObjectManager $manager): void
    {
        $campagne = new Campagne();
        $campagne->setNom("Cotisation Noël");
        $campagne->setDateDebut(new \DateTime('2026-11-28 21:07:00'));
        $campagne->setDateFin(new \DateTime('2026-12-28 21:07:00'));
        $campagne->setMontant(800000);
        $campagne->setCreatedAt(new \DateTimeImmutable('2026-10-28 21:07:00'));
        $campagne->setUpdatedAt(null);
        $groupement = $this->getReference(GroupementFixture::GROUPEMENT_REFERENCE,Groupement::class);
        $campagne->setGroupement($groupement);
        $type=$this->getReference(TypeFixture::TYPE_REFERENCE,Type::class);
        $campagne->setType($type);
        $manager->persist($campagne);
        $this->addReference(self::CAMPAGNE_REFERENCE,$campagne);
        $manager->flush();
    }
    public function getDependencies():array{
        return[
            GroupementFixture::class,
            TypeFixture::class
        ];
    }
}
