<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    /**
     * @Route("/base", name="base")
     */
    public function index(): Response
    {
        return $this->render('base/index.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }
    
    /**
     * @Route("/GSB", name="GSB")
     */
    public function GSB(): Response
    {
        return $this->render('SI/GSB/GSB.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }
    
    /**
     * @Route("/Gestion", name="Gestion")
     */
    public function Gestion(): Response
    {
        return $this->render('SI/Gestion/Gestion.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }
    
    /**
     * @Route("/Equipement", name="Equipement")
     */
    public function Equipement(): Response
    {
        return $this->render('SI/Equipement/Equipement.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }
    
    /**
     * @Route("/Repart", name="Repart")
     */
    public function Repartition(): Response
    {
        return $this->render('Reseau/Répartition/Repart.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }
    
    /**
     * @Route("/Segm", name="Segm")
     */
    public function Segmentation(): Response
    {
        return $this->render('Reseau/Segmentation/Segmentation.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }
    
    /**
     * @Route("/lesUtilisateurs", name="lesUtilisateurs")
     */
    public function lesUtilisateurs(): Response
    {
        $repo = $this->getDoctrine()->getRepository(\App\Entity\Utilisateur::class);
        $lesUtili = $repo->findAll();
        $nombre = $repo->nombreUtilisateur();
        return $this->render('Utilisateurs/lesUtilisateurs/lesUtilisateurs.html.twig',['listeUtilisateur' => $lesUtili, 'nombre' => $nombre[0]["1"]] );
    }
    
    /**
     * @Route("/carducien", name="carducien")
     */
    public function carducien(): Response
    {
        $repo = $this->getDoctrine()->getRepository(\App\Entity\Utilisateur::class);
        $cahors = $repo->carducien();
        
        return $this->render('Utilisateurs/Carducien/Carducien.html.twig',['lesCarduciens' => $cahors] );
    }
    
    /**
     * @Route("/frais", name="frais")
     */
    public function frais(): Response
    {
        $repo = $this->getDoctrine()->getRepository(\App\Entity\Fichefrais::class);
        $idFrais = $repo->findAll();
        $montant = $repo->fraisUser();
      
        
        return $this->render('Utilisateurs/Frais/Frais.html.twig',['idFrais' => $idFrais, 'montant' => $montant]);
    }
    
    /**
     * @Route("/Nfrais", name="Nfrais")
     */
    public function Nfrais(): Response
    {
        $repo = $this->getDoctrine()->getRepository(\App\Entity\Fichefrais::class);
        $utilisateur = $repo->fraisNUser();

        return $this->render('Utilisateurs/NFrais/NFrais.html.twig',['nFrais' => $utilisateur]);
    }
    
    /**
     * @Route("/Nbfrais", name="Nbfrais")
     */
    public function Nbfrais(): Response
    {
        $repo = $this->getDoctrine()->getRepository(\App\Entity\Fichefrais::class);
        $utilisateur = $repo->nombreFais();

        return $this->render('Utilisateurs/Frais/NbFrais.html.twig',['nbFrais' => $utilisateur]);
    }
    
    /**
     * @Route("/domaine", name="domaine")
     */
    public function domaine(): Response
    {
        $repo = $this->getDoctrine()->getRepository(\App\Entity\Categorie::class);
        $domaine = $repo->findAll();

        return $this->render('Utilisateurs/Domaine/Domaine.html.twig',['domaine' => $domaine]);
    }
    
    /**
     * @Route("/secondaire", name="secondaire")
     */
    public function secondaire(): Response
    {
        $repo = $this->getDoctrine()->getRepository(\App\Entity\UtilisateurSecondaire::class);
        $secondaire = $repo->findAll();

        return $this->render('Utilisateurs/Secondaire/Secondaire.html.twig',['secondaire' => $secondaire]);
    }
}
