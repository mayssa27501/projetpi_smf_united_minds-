<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\RecommandationsRepository;


#[ORM\Entity(repositoryClass: RecommandationsRepository::class)]
class Recommandations
{
 
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ? int $id=null;

    #[ORM\ManyToOne(targetEntity: Evenement::class)]
    #[ORM\JoinColumn(name: "id_evenement", referencedColumnName: "id_evenement")]
    private ?Evenement $idEvenement = null;

    
    #[ORM\ManyToOne(targetEntity: Membre::class)]
    #[ORM\JoinColumn(name: "id_user", referencedColumnName: "id_user")]
    private ?Membre $idUser = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdEvenement(): ?Evenement
    {
        return $this->idEvenement;
    }

    public function setIdEvenement(?Evenement $idEvenement): self
    {
        $this->idEvenement = $idEvenement;

        return $this;
    }

    public function getIdUser(): ?Membre
    {
        return $this->idUser;
    }

    public function setIdUser(?Membre $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

  


}
