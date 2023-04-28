<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={@ORM\Index(name="id_oeuvre", columns={"id_oeuvre"}), @ORM\Index(name="id_u", columns={"id_u"})})
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
     * @var \OeuvreD'art
     *
     * @ORM\ManyToOne(targetEntity="OeuvreD'art")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_oeuvre", referencedColumnName="id_oeuvre")
     * })
     */
    private $idOeuvre;

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
