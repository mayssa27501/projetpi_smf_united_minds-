<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ParticipationRepository;



#[ORM\Entity(repositoryClass: ParticipationRepository::class)]
class Participation
{
   
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ? int $id=null;

   
    #[ORM\ManyToOne(targetEntity: Membre::class, inversedBy: "participations")]
    #[ORM\JoinColumn(name: "membre_id", referencedColumnName: "id_user")]
    private ?Membre $membre = null;


    
    #[ORM\ManyToOne(targetEntity: Evenement::class, inversedBy: "participations")]
    #[ORM\JoinColumn(name: "evenement_id", referencedColumnName: "id_evenement")]
    private ?Evenement $evenement = null;

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
        return $this->evenement;
    }

    public function setEvenement(?Evenement $evenement): self
    {
        $this->evenement = $evenement;

        return $this;
    }


}
