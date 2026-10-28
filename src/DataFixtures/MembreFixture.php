<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Membre;
use App\Entity\Role;
use App\Entity\Groupement;

class MembreFixture extends Fixture implements DependentFixtureInterface
{
    public const MEMBRE_REFERENCE='membre-Faye Sarr';
    public function load(ObjectManager $manager): void
    {
        $membre = new Membre();
        $membre->setNom("Faye Sarr");
        $membre->setTelephone("778889900");
        $membre->setAddresse("Ouakam Villa n'354 A");
        $membre->setLogin("sarr");
        $membre->setPassword("passer1234");
        $role=$this->getReference(RoleFixture::ROLE_REFERENCE,Role::class);
        $membre->setRole($role);
        $groupement = $this->getReference(GroupementFixture::GROUPEMENT_REFERENCE,Groupement::class);
        $membre->setGroupement($groupement);
        $manager->persist($membre);
        $this->addReference(self::MEMBRE_REFERENCE, $membre);
        $manager->flush();
    }
    public function getDependencies():array{
        return[
            GroupementFixture::class
        ];
    }
}
