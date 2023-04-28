<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OeuvreD'art
 *
 * @ORM\Table(name="oeuvre d'art", indexes={@ORM\Index(name="id_u", columns={"id_u"})})
 * @ORM\Entity
 */
class OeuvreD'art
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
     *   @ORM\JoinColumn(name="id_u", referencedColumnName="id_membre")
     * })
     */
    private $idU;


}
