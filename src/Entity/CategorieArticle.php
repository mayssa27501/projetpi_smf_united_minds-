<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * CategorieArticle
 *
 * @ORM\Table(name="categorie_article", indexes={@ORM\Index(name="id_artic", columns={"id_artic"})})
 * @ORM\Entity
 */
class CategorieArticle
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_cat_artic", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCatArtic;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_cat_artic", type="string", length=255, nullable=false)
     */
    private $nomCatArtic;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout_artic", type="date", nullable=false)
     */
    private $dateAjoutArtic;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptif_artic", type="string", length=255, nullable=false)
     */
    private $descriptifArtic;

    /**
     * @var \Article
     *
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_artic", referencedColumnName="id_artic")
     * })
     */
    private $idArtic;

    public function getIdCatArtic(): ?int
    {
        return $this->idCatArtic;
    }

    public function getNomCatArtic(): ?string
    {
        return $this->nomCatArtic;
    }

    public function setNomCatArtic(string $nomCatArtic): self
    {
        $this->nomCatArtic = $nomCatArtic;

        return $this;
    }

    public function getDateAjoutArtic(): ?\DateTimeInterface
    {
        return $this->dateAjoutArtic;
    }

    public function setDateAjoutArtic(\DateTimeInterface $dateAjoutArtic): self
    {
        $this->dateAjoutArtic = $dateAjoutArtic;

        return $this;
    }

    public function getDescriptifArtic(): ?string
    {
        return $this->descriptifArtic;
    }

    public function setDescriptifArtic(string $descriptifArtic): self
    {
        $this->descriptifArtic = $descriptifArtic;

        return $this;
    }

    public function getIdArtic(): ?Article
    {
        return $this->idArtic;
    }

    public function setIdArtic(?Article $idArtic): self
    {
        $this->idArtic = $idArtic;

        return $this;
    }


}
