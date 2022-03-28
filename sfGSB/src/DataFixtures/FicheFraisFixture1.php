<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface ;

class FicheFraisFixture1 extends Fixture implements DependentFixtureInterface
{
    public const id_FicheFrais1_REFERENCE = 'id-fiche1' ;
    public function load(ObjectManager $manager)
    {
        $uneFiche = new \App\Entity\Fichefrais();
        $uneFiche->setIdutilisateur($this->getReference(UtilisateurFixture::id_USER_REFERENCE));
        $uneFiche->setMois("202011");
        $uneFiche->setNbjustificatifs(2);
        $uneFiche->setIdetat($this->getReference(EtatFixtureEN::id_ETAT2_REFERENCE));
        $manager->persist($uneFiche);
        $manager->flush();
        
        $this -> addReference ( self :: id_FicheFrais1_REFERENCE , $uneFiche );
    }
    
    public function getDependencies ()
    {
        return array (
            UtilisateurFixture:: class ,
        );
    }

}
