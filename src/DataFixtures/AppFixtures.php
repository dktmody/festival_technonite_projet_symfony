<?php

namespace App\DataFixtures;

use App\Entity\Artiste;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        // $faker = Factory::create('fr_FR');

        // for ($i = 1; $i < 9; $i++) {
        //     $artiste = new Artiste();
        //     $artiste->setName('DJ' . $faker->name())
        //         ->setDescription($faker->text());
        //     $manager->persist($artiste);
        // }

        $manager->flush();
    }
}
