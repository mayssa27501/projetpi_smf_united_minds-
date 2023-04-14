<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * CategorieEvenement
 *
 * @ORM\Table(name="categorie_evenement", indexes={@ORM\Index(name="id_event", columns={"id_event"})})
 * @ORM\Entity
 */
class CategorieEvenement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_cat_event", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCatEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_cat_event", type="string", length=255, nullable=false)
     */
    private $nomCatEvent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout_event", type="date", nullable=false)
     */
    private $dateAjoutEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptif_cat_event", type="string", length=255, nullable=false)
     */
    private $descriptifCatEvent;

    /**
     * @var \Evenement
     *
     * @ORM\ManyToOne(targetEntity="Evenement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_event", referencedColumnName="id_event")
     * })
     */
    private $idEvent;

    public function getIdCatEvent(): ?int
    {
        return $this->idCatEvent;
    }

    public function getNomCatEvent(): ?string
    {
        return $this->nomCatEvent;
    }

    public function setNomCatEvent(string $nomCatEvent): self
    {
        $this->nomCatEvent = $nomCatEvent;

        return $this;
    }

    public function getDateAjoutEvent(): ?\DateTimeInterface
    {
        return $this->dateAjoutEvent;
    }

    public function setDateAjoutEvent(\DateTimeInterface $dateAjoutEvent): self
    {
        $this->dateAjoutEvent = $dateAjoutEvent;

        return $this;
    }

    public function getDescriptifCatEvent(): ?string
    {
        return $this->descriptifCatEvent;
    }

    public function setDescriptifCatEvent(string $descriptifCatEvent): self
    {
        $this->descriptifCatEvent = $descriptifCatEvent;

        return $this;
    }

    public function getIdEvent(): ?Evenement
    {
        return $this->idEvent;
    }

    public function setIdEvent(?Evenement $idEvent): self
    {
        $this->idEvent = $idEvent;

        return $this;
    }


}
