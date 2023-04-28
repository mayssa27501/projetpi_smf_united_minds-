<?php

namespace App\Entity;

use App\Repository\ParticipationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParticipationRepository::class)
 */
class Participation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity=Membre::class, inversedBy="participations")
     * @ORM\JoinColumn(name="membre_id", referencedColumnName="id_user", nullable=false)
     */
    private $membre;

    /**
     * @ORM\ManyToOne(targetEntity=Evenement::class, inversedBy="participations")
     * @ORM\JoinColumn(name="evenement_id", referencedColumnName="id_evenement", nullable=false)
     */
    private $Evenement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMembre(): ?Membre
    {
        return $this->membre;
    }

    public function setMembre(?Membre $membre): self
    {
        $this->membre = $membre;

        return $this;
    }

    public function getEvenement(): ?Evenement
    {
        return $this->Evenement;
    }

    public function setEvenement(?Evenement $Evenement): self
    {
        $this->Evenement = $Evenement;

        return $this;
    }
}
