<?php

namespace App\Entity;
use Doctrine\DBAL\Types\Types;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Forum
 *
 * @ORM\Table(name="forum", indexes={@ORM\Index(name="id_topic", columns={"id_topic"})})
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
    #[Assert\NotBlank(message:" *Champ Obligatoire")]
    #[Assert\Length(min:10,max:20,minMessage:" *description ne contient pas le minimum des caractères.")]

    private $titreForum;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptif_forum", type="string", length=255, nullable=false)
     */
    #[Assert\NotBlank(message:" *Champ Obligatoire")]
    #[Assert\Length(min:10,max:20,minMessage:" *description ne contient pas le minimum des caractères.")]

    private $descriptifForum;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_forum", type="date", nullable=true)
     */
    private $dateForum;

    /**
     * @var int|null
     *
     * @ORM\Column(name="likes", type="integer", nullable=true)
     */
    private $likes;

    /**
     * @var \Topic
     *
     * @ORM\ManyToOne(targetEntity="Topic")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_topic", referencedColumnName="id_topic")
     * })
     */
    private $idTopic;

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

    public function setDateForum(?\DateTimeInterface $dateForum): self
    {
        $this->dateForum = $dateForum;

        return $this;
    }

    public function getIdTopic(): ?Topic
    {
        return $this->idTopic;
    }

    public function setIdTopic(?Topic $idTopic): self
    {
        $this->idTopic = $idTopic;

        return $this;
    }
    public function getLikes(): ?int
    {
        return $this->likes;
    }

    public function setLikes(int $likes): self
    {
        $this->likes = $likes;

        return $this;
    }


}
