<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PanierRepository")
 */
class Panier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(name="id_panier", type="integer")
     */
    private $id_panier;

  /**
 * @ORM\ManyToOne(targetEntity="App\Entity\User")
 * @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id")
 */
private $id_utilisateur;


    /**
 * @ORM\ManyToOne(targetEntity="App\Entity\Oeuvre")
 * @ORM\JoinColumn(name="id_oeuvre", referencedColumnName="id")
 */
private $id_oeuvre;


    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    public function getIdPanier(): ?int
    {
        return $this->id_panier;
    }

    public function getIdUtilisateur(): ?User
    {
        return $this->id_utilisateur;
    }

    public function setIdUtilisateur(?User $id_utilisateur): self
    {
        $this->id_utilisateur = $id_utilisateur;

        return $this;
    }

    public function getIdOeuvre(): ?Oeuvre
    {
        return $this->id_oeuvre;
    }

    public function setIdOeuvre(?Oeuvre $id_oeuvre): self
    {
        $this->id_oeuvre = $id_oeuvre;

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
}
