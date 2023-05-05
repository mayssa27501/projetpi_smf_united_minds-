<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CategorieRepository;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
   
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ? int $idCategorie=null;

   
    #[ORM\Column(length : 255)]
    private ? string $nom=null;


    #[ORM\Column(length : 255)]
    private ? string $descriptif=null;

    public function getIdCategorie(): ?int
    {
        return $this->idCategorie;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(string $descriptif): self
    {
        $this->descriptif = $descriptif;

        return $this;
    }
    



}
