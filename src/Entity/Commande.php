<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CommandeRepository;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]

class Commande
{
 
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ? int $idCommande=null;

    
    #[ORM\Column(length : 255)]
    private ? string $adresse=null;

    
    #[ORM\Column]
    private ? int $quantite=null;

    
    #[ORM\Column]
    private ? float $prixc=null;

    
    #[ORM\ManyToOne(targetEntity: Oeuvre::class)]
    #[ORM\JoinColumn(name: "id_oeuvre", referencedColumnName: "id")]
    private ?Oeuvre $idOeuvre = null;

    
    #[ORM\ManyToOne(targetEntity: Membre::class)]
    #[ORM\JoinColumn(name: "id_u", referencedColumnName: "id_user")]
    private ?Membre $idU = null;

    public function getIdCommande(): ?int
    {
        return $this->idCommande;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
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

    public function getPrixc(): ?float
    {
        return $this->prixc;
    }

    public function setPrixc(float $prixc): self
    {
        $this->prixc = $prixc;

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

    public function getIdU(): ?Membre
    {
        return $this->idU;
    }

    public function setIdU(?Membre $idU): self
    {
        $this->idU = $idU;

        return $this;
    }

  


}
