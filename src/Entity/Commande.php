<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={@ORM\Index(name="id_u", columns={"id_u"}), @ORM\Index(name="id_oeuvre", columns={"id_oeuvre"})})
 * @ORM\Entity
 */
class Commande
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_commande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommande;

    /**
     * @var string
     *
     * @ORM\Column(name="addresse_commande", type="string", length=255, nullable=false)
     */
    private $addresseCommande;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite_commande", type="integer", nullable=false)
     */
    private $quantiteCommande;

    /**
     * @var int
     *
     * @ORM\Column(name="prix_commande", type="integer", nullable=false)
     */
    private $prixCommande;

    /**
     * @var int
     *
     * @ORM\Column(name="num_tel_commande", type="integer", nullable=false)
     */
    private $numTelCommande;

    /**
     * @var \Membre
     *
     * @ORM\ManyToOne(targetEntity="Membre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_u", referencedColumnName="id_membre")
     * })
     */
    private $idU;

    /**
     * @var \OeuvreDart
     *
     * @ORM\ManyToOne(targetEntity="OeuvreDart")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_oeuvre", referencedColumnName="id_oeuvre")
     * })
     */
    private $idOeuvre;

    public function getIdCommande(): ?int
    {
        return $this->idCommande;
    }

    public function getAddresseCommande(): ?string
    {
        return $this->addresseCommande;
    }

    public function setAddresseCommande(string $addresseCommande): self
    {
        $this->addresseCommande = $addresseCommande;

        return $this;
    }

    public function getQuantiteCommande(): ?int
    {
        return $this->quantiteCommande;
    }

    public function setQuantiteCommande(int $quantiteCommande): self
    {
        $this->quantiteCommande = $quantiteCommande;

        return $this;
    }

    public function getPrixCommande(): ?int
    {
        return $this->prixCommande;
    }

    public function setPrixCommande(int $prixCommande): self
    {
        $this->prixCommande = $prixCommande;

        return $this;
    }

    public function getNumTelCommande(): ?int
    {
        return $this->numTelCommande;
    }

    public function setNumTelCommande(int $numTelCommande): self
    {
        $this->numTelCommande = $numTelCommande;

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

    public function getIdOeuvre(): ?OeuvreDart
    {
        return $this->idOeuvre;
    }

    public function setIdOeuvre(?OeuvreDart $idOeuvre): self
    {
        $this->idOeuvre = $idOeuvre;

        return $this;
    }


}
