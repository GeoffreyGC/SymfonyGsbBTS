<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class EtatFixtureSA extends Fixture
{
    public const id_ETAT_REFERENCE = 'id-etat1' ;
    
    public function load(ObjectManager $manager)
    {
        $unEtat = new \App\Entity\Etat();
        $unEtat->setId('SA');
        $unEtat->setLibelle('Saisie');
        $manager->persist($unEtat);
        $manager->flush();
        
        $this -> addReference ( self :: id_ETAT_REFERENCE , $unEtat );
    }
}
