<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Topic
 *
 * @ORM\Table(name="topic")
 * @ORM\Entity
 */
class Topic
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_topic", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTopic;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptif_topic", type="string", length=255, nullable=false)
     */
    private $descriptifTopic;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_topic", type="date", nullable=true)
     */
    private $dateTopic;

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

    public function getDateTopic(): ?\DateTimeInterface
    {
        return $this->dateTopic;
    }

    public function setDateTopic(?\DateTimeInterface $dateTopic): self
    {
        $this->dateTopic = $dateTopic;

        return $this;
    }


}
