<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface ;

class LigneFraisHorsForfait extends Fixture implements DependentFixtureInterface
{
    public function load ( ObjectManager $manager )
    {
        $unEtat2 = new \App\Entity\Lignefraishorsforfait();
        $unEtat2->setIdfiche($this->getReference(FicheFraisFixture1::id_FicheFrais1_REFERENCE));
        $unEtat2->setLibelle("repas gastronomique");
        $unEtat2->setDate(new \DateTime("2022-03-10"));
        $unEtat2->setMontant("1000");
        $manager->persist($unEtat2);
        $manager->flush();
    }
    
    public function getDependencies ()
    {
    return array (
     FicheFraisFixture1:: class , 
    );
    }
}
