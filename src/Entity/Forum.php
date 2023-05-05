<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity]
class Forum
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ? int $idForum=null;

    #[ORM\Column(length : 255)]
    private ? string $titreForum=null;

    
    #[ORM\Column(length : 255)]
    private ? string $descriptifForum=null;


    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $dateForum = null;

    
    #[ORM\Column]
    private ? int $likes=null;

    
    #[ORM\ManyToOne(targetEntity: Topic::class)]
    #[ORM\JoinColumn(name: "id_topic", referencedColumnName: "id_topic")]
    private ?Topic $idTopic = null;

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

    public function getDateForum(): ?\DateTimeImmutable
    {
        return $this->dateForum;
    }

    public function setDateForum(\DateTimeImmutable $dateForum): self
{
    $this->dateForum = $dateForum;
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

    public function getIdTopic(): ?Topic
    {
        return $this->idTopic;
    }

    public function setIdTopic(?Topic $idTopic): self
    {
        $this->idTopic = $idTopic;

        return $this;
    }
    
    public function __toString(): string
{
    return $this->titreForum ?: 'Forum #'.$this->idForum;
}


}
