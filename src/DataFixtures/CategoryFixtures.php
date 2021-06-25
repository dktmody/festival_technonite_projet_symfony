<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $category = new Categorie();
        
        $categoryNames = ['Mélodique', 'Industrielle', 'Groovy', 'Deep', 'Détroit'];

        for ($i = 0; $i < 5; $i++) {
            $category = new Categorie();
            $category->setName($categoryNames[$i]);
            $category->setColor('red');
            $manager->persist($category);
        }

        $manager->flush();
    }
}
