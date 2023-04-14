<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
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
     *   @ORM\JoinColumn(name="id_u", referencedColumnName="id_user")
     * })
     */
    private $idU;

    public function getIdArtic(): ?int
    {
        return $this->idArtic;
    }

    public function getTitreArtic(): ?string
    {
        return $this->titreArtic;
    }

    public function setTitreArtic(string $titreArtic): self
    {
        $this->titreArtic = $titreArtic;

        return $this;
    }

    public function getThemeArtic(): ?string
    {
        return $this->themeArtic;
    }

    public function setThemeArtic(string $themeArtic): self
    {
        $this->themeArtic = $themeArtic;

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

    public function getDescreptifArtic(): ?string
    {
        return $this->descreptifArtic;
    }

    public function setDescreptifArtic(string $descreptifArtic): self
    {
        $this->descreptifArtic = $descreptifArtic;

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
