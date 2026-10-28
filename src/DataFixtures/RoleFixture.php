<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Role;

class RoleFixture extends Fixture
{
    public const ROLE_REFERENCE='role-responsable';
    public function load(ObjectManager $manager): void
    {
        $role=new Role();
        $role->setNom("responsable");
        $manager->persist($role);
        $this->addReference(self::ROLE_REFERENCE,$role);
        $manager->flush();
    }
}
