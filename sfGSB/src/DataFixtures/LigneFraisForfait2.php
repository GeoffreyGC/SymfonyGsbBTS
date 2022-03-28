<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface ;

class LigneFraisForfait2 extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $uneFiche = new \App\Entity\Lignefraisforfait();
        $uneFiche->setIdfiche($this->getReference(FicheFraisFixture2::id_FicheFrais2_REFERENCE));
        $uneFiche->setIdfraisforfait($this->getReference(FraisForfaitWE::id_FraisWE_REFERENCE));
        $uneFiche->setQuantite(3);
       
        $manager->persist($uneFiche);
        $manager->flush();
    }
    
    public function getDependencies ()
    {
    return array (
     FicheFraisFixture2:: class , FraisForfaitWE:: class,
    );
    }
}
