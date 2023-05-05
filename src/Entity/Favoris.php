<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\FavorisRepository;


#[ORM\Entity(repositoryClass: FavorisRepository::class)]
class Favoris
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ? int $id=null;

    
    #[ORM\ManyToOne(targetEntity: Oeuvre::class)]
    #[ORM\JoinColumn(name: "id_oeuvre", referencedColumnName: "id")]
    private ?Oeuvre $idOeuvre = null;

    
    #[ORM\ManyToOne(targetEntity: Membre::class)]
    #[ORM\JoinColumn(name: "id_a", referencedColumnName: "id_user")]
    private ?Membre $idA = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdA(): ?Membre
    {
        return $this->idA;
    }

    public function setIdA(?Membre $idA): self
    {
        $this->idA = $idA;

        return $this;
    }

    


}
