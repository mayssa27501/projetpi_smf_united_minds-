<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OeuvreDart
 *
 * @ORM\Table(name="oeuvre dart", indexes={@ORM\Index(name="id_u", columns={"id_u"})})
 * @ORM\Entity
 */
class OeuvreDart
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_oeuvre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOeuvre;

    /**
     * @var string
     *
     * @ORM\Column(name="type_oeuvre", type="string", length=255, nullable=false)
     */
    private $typeOeuvre;

    /**
     * @var int
     *
     * @ORM\Column(name="nombre_oeuvre", type="integer", nullable=false)
     */
    private $nombreOeuvre;

    /**
     * @var string
     *
     * @ORM\Column(name="couleur_oeuvre", type="string", length=255, nullable=false)
     */
    private $couleurOeuvre;

    /**
     * @var int
     *
     * @ORM\Column(name="prix_oeuvre", type="integer", nullable=false)
     */
    private $prixOeuvre;

    /**
     * @var string
     *
     * @ORM\Column(name="dimension_oeuvre", type="string", length=255, nullable=false)
     */
    private $dimensionOeuvre;

    /**
     * @var \Membre
     *
     * @ORM\ManyToOne(targetEntity="Membre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_u", referencedColumnName="id_user")
     * })
     */
    private $idU;

    public function getIdOeuvre(): ?int
    {
        return $this->idOeuvre;
    }

    public function getTypeOeuvre(): ?string
    {
        return $this->typeOeuvre;
    }

    public function setTypeOeuvre(string $typeOeuvre): self
    {
        $this->typeOeuvre = $typeOeuvre;

        return $this;
    }

    public function getNombreOeuvre(): ?int
    {
        return $this->nombreOeuvre;
    }

    public function setNombreOeuvre(int $nombreOeuvre): self
    {
        $this->nombreOeuvre = $nombreOeuvre;

        return $this;
    }

    public function getCouleurOeuvre(): ?string
    {
        return $this->couleurOeuvre;
    }

    public function setCouleurOeuvre(string $couleurOeuvre): self
    {
        $this->couleurOeuvre = $couleurOeuvre;

        return $this;
    }

    public function getPrixOeuvre(): ?int
    {
        return $this->prixOeuvre;
    }

    public function setPrixOeuvre(int $prixOeuvre): self
    {
        $this->prixOeuvre = $prixOeuvre;

        return $this;
    }

    public function getDimensionOeuvre(): ?string
    {
        return $this->dimensionOeuvre;
    }

    public function setDimensionOeuvre(string $dimensionOeuvre): self
    {
        $this->dimensionOeuvre = $dimensionOeuvre;

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
