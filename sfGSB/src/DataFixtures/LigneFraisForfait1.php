<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface ;

class LigneFraisForfait1 extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $uneFiche = new \App\Entity\Lignefraisforfait();
        $uneFiche->setIdfiche($this->getReference(FicheFraisFixture1::id_FicheFrais1_REFERENCE));
        $uneFiche->setIdfraisforfait($this->getReference(FraisForfaitSE::id_FraisSE_REFERENCE));
        $uneFiche->setQuantite(12);
       
        $manager->persist($uneFiche);
        $manager->flush();
    }
    
    public function getDependencies ()
    {
    return array (
     FicheFraisFixture1:: class , FraisForfaitSE:: class,
    );
    }
}
