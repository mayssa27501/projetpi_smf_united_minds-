<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PanierRepository;


#[ORM\Entity(repositoryClass: PanierRepository::class)]
class Panier
{
   
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ? int $idPanier=null;

    
    #[ORM\Column]
    private ? int $quantite=null;

    
    #[ORM\ManyToOne(targetEntity: Oeuvre::class)]
    #[ORM\JoinColumn(name: "id_oeuvre", referencedColumnName: "id")]
    private ?Oeuvre $idOeuvre = null;

    
    #[ORM\ManyToOne(targetEntity: Membre::class)]
    #[ORM\JoinColumn(name: "id_utilisateur", referencedColumnName: "id_user")]
    private ?Membre $idUtilisateur = null;

    public function getIdPanier(): ?int
    {
        return $this->idPanier;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getIdOeuvre(): ?Oeuvre
    {
        return $this->idOeuvre;
    }

    public function setIdOeuvre(?Oeuvre $idOeuvre): self
    {
        $this->idOeuvre = $idOeuvre;

        return $this;
    }

    public function getIdUtilisateur(): ?Membre
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?Membre $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

   


}
