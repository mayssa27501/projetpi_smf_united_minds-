<?php

namespace App\Entity;

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


}
