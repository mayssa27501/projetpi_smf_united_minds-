<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\RateRepository;


#[ORM\Entity(repositoryClass: RateRepository::class)]
class Rate
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ? int $idRate=null;

    
    #[ORM\Column]
    private ? int $note=null;

    
    #[ORM\ManyToOne(targetEntity: Oeuvre::class)]
    #[ORM\JoinColumn(name: "id_oeuvre", referencedColumnName: "id")]
    private ?Oeuvre $idOeuvre = null;

    public function getIdRate(): ?int
    {
        return $this->idRate;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getIdOeuvre(): ?Oeuvre
    {
        return $this->idOeuvre;
    }

    public function setIdOeuvre(?Oeuvre $idOeuvre): self
    {
        $this->idOeuvre = $idOeuvre;

        return $this;
    }

  


}
