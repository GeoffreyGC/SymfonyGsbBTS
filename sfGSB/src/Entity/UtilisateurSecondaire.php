<?php

namespace App\Entity;

use App\Repository\UtilisateurSecondaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateurSecondaireRepository::class)
 */
class UtilisateurSecondaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $niveau;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="utilisateurSecondaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Utili;

    /**
     * @ORM\ManyToOne(targetEntity=Fichefrais::class, inversedBy="utilisateurSecondaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $laFichefrais;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(int $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getUtili(): ?Utilisateur
    {
        return $this->Utili;
    }

    public function setUtili(?Utilisateur $Utili): self
    {
        $this->Utili = $Utili;

        return $this;
    }

    public function getLaFichefrais(): ?Fichefrais
    {
        return $this->laFichefrais;
    }

    public function setLaFichefrais(?Fichefrais $laFichefrais): self
    {
        $this->laFichefrais = $laFichefrais;

        return $this;
    }
}
