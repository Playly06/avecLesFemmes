<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Role extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $product = new Product();
        $product.setnom("manager");
        $member=new Member();
        $product.addMember($member);
        $manager->persist($product);

        $manager->flush();
    }
}
