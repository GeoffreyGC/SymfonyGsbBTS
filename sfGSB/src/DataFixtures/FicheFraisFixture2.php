<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface ;

class FicheFraisFixture2 extends Fixture implements DependentFixtureInterface
{
    public const id_FicheFrais2_REFERENCE = 'id-fiche2' ;
    
    public function load(ObjectManager $manager)
    {
        $uneFiche = new \App\Entity\Fichefrais();
        $uneFiche->setIdutilisateur($this->getReference(UtilisateurFixture::id_USER_REFERENCE));
        $uneFiche->setMois("202010");
        $uneFiche->setNbjustificatifs(1);
        $uneFiche->setMontantvalide("1000");
        $uneFiche->setIdetat($this->getReference(EtatFixtureEN::id_ETAT2_REFERENCE));
        $manager->persist($uneFiche);
        $manager->flush();
        
        $this -> addReference ( self :: id_FicheFrais2_REFERENCE , $uneFiche );
    }
    
    public function getDependencies ()
    {
    return array (
        UtilisateurFixture:: class ,
    );
    }
}
