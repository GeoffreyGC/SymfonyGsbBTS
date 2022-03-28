<?php

namespace App\Repository;

use App\Entity\Fichefrais;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fichefrais|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fichefrais|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fichefrais[]    findAll()
 * @method Fichefrais[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FichefraisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fichefrais::class);
    }

    // /**
    //  * @return Fichefrais[] Returns an array of Fichefrais objects
    //  */
    
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    

    
    public function findOneBySomeField($value): ?Fichefrais
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    
    public function fraisUser(){
    
    $em = $this->getEntityManager();
    $query = $em->createQuery("SELECT f.prenom, f.nom, SUM(p.montantvalide) as Montant FROM App\Entity\Fichefrais p INNER JOIN  App\Entity\Utilisateur f WITH p.idutilisateur = f.id GROUP BY p.idutilisateur") ; 
    $laListe = $query-> getArrayResult() ;
    return $laListe;
    
    }
    
    public function fraisNUser(){
    
    $em = $this->getEntityManager();
    $query = $em->createQuery("SELECT f.prenom, f.nom, p.montantvalide FROM App\Entity\Utilisateur f LEFT JOIN  App\Entity\Fichefrais p WITH p.idutilisateur = f.id WHERE p.montantvalide IS NULL") ; 
    $laListe = $query-> getArrayResult() ;
    return $laListe;
    
    }
    
    public function nombreFais(){
    
    $em = $this->getEntityManager();
    $query = $em->createQuery("SELECT f.prenom, f.nom, COUNT(p.id) as Nombre FROM App\Entity\Utilisateur f LEFT JOIN  App\Entity\Fichefrais p WITH p.idutilisateur = f.id GROUP BY f.id") ; 
    $laListe = $query-> getArrayResult() ;
    return $laListe;
    
    }
    
}
