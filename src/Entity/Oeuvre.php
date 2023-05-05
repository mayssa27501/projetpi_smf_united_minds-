<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\OeuvreRepository;


#[ORM\Entity(repositoryClass: OeuvreRepository::class)]
class Oeuvre
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ? int $id=null;

    
    #[ORM\Column(length : 255)]
    private ? string $type=null;

    
    #[ORM\Column]
    private ? int $nb=null;

    
    #[ORM\Column(length : 255)]
    private ? string $couleur=null;

    
    #[ORM\Column]
    private ? float $prix=null;

   
    #[ORM\Column]
    private ? float $dimension=null;

   
    #[ORM\ManyToOne(targetEntity: Membre::class)]
    #[ORM\JoinColumn(name: "id_u", referencedColumnName: "id_user")]
    private ?Membre $idU = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getNb(): ?int
    {
        return $this->nb;
    }

    public function setNb(int $nb): self
    {
        $this->nb = $nb;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDimension(): ?float
    {
        return $this->dimension;
    }

    public function setDimension(float $dimension): self
    {
        $this->dimension = $dimension;

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

    public function __toString()
{
    return sprintf('%s (id: %d, type: %s, nb: %d, couleur: %s, prix: %.2f, dimension: %.2f, propriétaire: %s)', 
        self::class,
        $this->id,
        $this->type,
        $this->nb,
        $this->couleur,
        $this->prix,
        $this->dimension,
        $this->idU->getNom()
    );
}

}
