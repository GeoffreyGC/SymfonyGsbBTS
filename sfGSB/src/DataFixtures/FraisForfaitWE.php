<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FraisForfaitWE extends Fixture
{
    public const id_FraisWE_REFERENCE = 'id-fraisWE' ;
    
    public function load(ObjectManager $manager)
    {
        $uneFiche = new \App\Entity\Fraisforfait();
        $uneFiche->setId("WE");
        $uneFiche->setLibelle("prix week-end");
        $uneFiche->setMontant("80");
       
        $manager->persist($uneFiche);
        $manager->flush();
        
        $this -> addReference ( self :: id_FraisWE_REFERENCE , $uneFiche );
    }
}
