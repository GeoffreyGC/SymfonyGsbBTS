<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtatFixtureEN extends Fixture
{
    public const id_ETAT2_REFERENCE = 'id-etat2' ;
    
    public function load ( ObjectManager $manager )
    {
        $unEtat2 = new \App\Entity\Etat();
        $unEtat2->setId('EN');
        $unEtat2->setLibelle('Enregistrer');
        $manager->persist($unEtat2);
        $manager->flush();
        
        $this -> addReference ( self :: id_ETAT2_REFERENCE , $unEtat2 );
    }

}
