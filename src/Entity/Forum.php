<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Forum
 *
 * @ORM\Table(name="forum", indexes={@ORM\Index(name="id_u", columns={"id_u"})})
 * @ORM\Entity
 */
class Forum
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_forum", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idForum;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_forum", type="string", length=255, nullable=false)
     */
    private $titreForum;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptif_forum", type="string", length=255, nullable=false)
     */
    private $descriptifForum;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_forum", type="date", nullable=false)
     */
    private $dateForum;

    /**
     * @var \Membre
     *
     * @ORM\ManyToOne(targetEntity="Membre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_u", referencedColumnName="id_user")
     * })
     */
    private $idU;

    public function getIdForum(): ?int
    {
        return $this->idForum;
    }

    public function getTitreForum(): ?string
    {
        return $this->titreForum;
    }

    public function setTitreForum(string $titreForum): self
    {
        $this->titreForum = $titreForum;

        return $this;
    }

    public function getDescriptifForum(): ?string
    {
        return $this->descriptifForum;
    }

    public function setDescriptifForum(string $descriptifForum): self
    {
        $this->descriptifForum = $descriptifForum;

        return $this;
    }

    public function getDateForum(): ?\DateTimeInterface
    {
        return $this->dateForum;
    }

    public function setDateForum(\DateTimeInterface $dateForum): self
    {
        $this->dateForum = $dateForum;

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
