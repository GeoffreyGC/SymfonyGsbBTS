<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FraisForfaitSE extends Fixture
{
    public const id_FraisSE_REFERENCE = 'id-fraisSE' ;
    
    public function load(ObjectManager $manager)
    {
        $uneFiche = new \App\Entity\Fraisforfait();
        $uneFiche->setId("SE");
        $uneFiche->setLibelle("prix semaine");
        $uneFiche->setMontant("50");
       
        $manager->persist($uneFiche);
        $manager->flush();
        
        $this -> addReference ( self :: id_FraisSE_REFERENCE , $uneFiche );
    }
}
