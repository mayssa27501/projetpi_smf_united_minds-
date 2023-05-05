<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TopicRepository;
use Doctrine\DBAL\Types\Types;



#[ORM\Entity(repositoryClass: TopicRepository::class)]
class Topic
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ? int $idTopic=null;

    
    #[ORM\Column(length : 255)]
    private ? string $descriptifTopic=null;

    
    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $dateTopic = null;



    public function getIdTopic(): ?int
    {
        return $this->idTopic;
    }

    public function getDescriptifTopic(): ?string
    {
        return $this->descriptifTopic;
    }

    public function setDescriptifTopic(string $descriptifTopic): self
    {
        $this->descriptifTopic = $descriptifTopic;

        return $this;
    }

    public function getDateTopic(): ?\DateTimeImmutable
    {
        return $this->dateTopic;
    }

    public function setDateTopic(\DateTimeImmutable $dateTopic): self
    {
        $this->dateTopic = $dateTopic;

        return $this;
    }
    public function __toString()
{
    return $this->descriptifTopic;
}


}
