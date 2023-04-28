<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 */
class Oeuvre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $couleur;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\Column(type="float")
     */
    private $dimension;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_u;
    

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

    public function getIdU(): ?int
    {
        return $this->id_u;
    }

    public function setIdU(int $id_u): self
    {
        $this->id_u = $id_u;

        return $this;
    }
<<<<<<< Updated upstream
=======
    public function __toString()
{
    return sprintf('%s (id: %d, type: %s, nb: %d, couleur: %s, prix: %.2f, dimension: %.2f, id_u: %d)',
        self::class,
        $this->id,
        $this->type,
        $this->nb,
        $this->couleur,
        $this->prix,
        $this->dimension,
        $this->id_u
    );
}
    
>>>>>>> Stashed changes
}
