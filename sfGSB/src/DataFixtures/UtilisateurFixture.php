<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class UtilisateurFixture extends Fixture
{
    public const id_USER_REFERENCE = 'id-user' ;
    
    public function load(ObjectManager $manager)
    {
        $unUtili = new \App\Entity\Utilisateur();
        $unUtili->setId('ul');
        $unUtili->setNom('Dicule');
        $unUtili->setPrenom('Terry');
        $unUtili->setAdresse('25, rue du jambon');
        $unUtili->setCp('62999');
        $unUtili->setVille('Leport');
        $unUtili->setDateembauche(new \DateTime('2019-10-01'));
        $manager->persist($unUtili);
        $manager->flush();
        
        $this -> addReference ( self :: id_USER_REFERENCE , $unUtili );
    }
    
   
}
