<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Type;

class TypeFixture extends Fixture
{
    public const TYPE_REFERENCE='type-evenement';
    public function load(ObjectManager $manager): void
    {
        $type=new Type();
        $type->setNom("evenement");
        $manager->persist($type);
        $this->addReference(self::TYPE_REFERENCE,$type);
        $manager->flush();
    }
}
