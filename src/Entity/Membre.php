<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Membre
 *
 * @ORM\Table(name="membre")
 * @ORM\Entity
 */
class Membre
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_membre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMembre;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_membre", type="string", length=255, nullable=false)
     */
    private $nomMembre;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_membre", type="string", length=255, nullable=false)
     */
    private $prenomMembre;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_membre", type="string", length=255, nullable=false)
     */
    private $adresseMembre;

    /**
     * @var int
     *
     * @ORM\Column(name="num_tel_membre", type="integer", nullable=false)
     */
    private $numTelMembre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_nais_membre", type="date", nullable=false)
     */
    private $dateNaisMembre;

    public function getIdMembre(): ?int
    {
        return $this->idMembre;
    }

    public function getNomMembre(): ?string
    {
        return $this->nomMembre;
    }

    public function setNomMembre(string $nomMembre): self
    {
        $this->nomMembre = $nomMembre;

        return $this;
    }

    public function getPrenomMembre(): ?string
    {
        return $this->prenomMembre;
    }

    public function setPrenomMembre(string $prenomMembre): self
    {
        $this->prenomMembre = $prenomMembre;

        return $this;
    }

    public function getAdresseMembre(): ?string
    {
        return $this->adresseMembre;
    }

    public function setAdresseMembre(string $adresseMembre): self
    {
        $this->adresseMembre = $adresseMembre;

        return $this;
    }

    public function getNumTelMembre(): ?int
    {
        return $this->numTelMembre;
    }

    public function setNumTelMembre(int $numTelMembre): self
    {
        $this->numTelMembre = $numTelMembre;

        return $this;
    }

    public function getDateNaisMembre(): ?\DateTimeInterface
    {
        return $this->dateNaisMembre;
    }

    public function setDateNaisMembre(\DateTimeInterface $dateNaisMembre): self
    {
        $this->dateNaisMembre = $dateNaisMembre;

        return $this;
    }


}
