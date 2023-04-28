<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article", indexes={@ORM\Index(name="id_u", columns={"id_u"})})
 * @ORM\Entity
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_artic", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idArtic;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_artic", type="string", length=255, nullable=false)
     */
    private $titreArtic;

    /**
     * @var string
     *
     * @ORM\Column(name="theme_artic", type="string", length=255, nullable=false)
     */
    private $themeArtic;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout_artic", type="date", nullable=false)
     */
    private $dateAjoutArtic;

    /**
     * @var string
     *
     * @ORM\Column(name="descreptif_artic", type="string", length=255, nullable=false)
     */
    private $descreptifArtic;

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
