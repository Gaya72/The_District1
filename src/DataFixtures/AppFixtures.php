<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{public function load(ObjectManager $manager): void {
    $categorie1 = new Categorie();
    $categorie1->setLibelle("Pizza");
    $manager->persist($categorie1);

    $plat1 = new Plat();
    $plat1->setLibelle("Margarita")->setCategorie($categorie1);
    $manager->persist($plat1);

    $manager->flush();
}
}
