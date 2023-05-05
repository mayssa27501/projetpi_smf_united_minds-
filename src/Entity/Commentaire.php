<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CommentaireRepository;


#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
class Commentaire
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ? int $idCom=null;

    
    #[ORM\Column(length : 255)]
    private ? string $descrptifCom=null;

    
    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeInterface $dateCom = null;

   
    #[ORM\ManyToOne(targetEntity: Forum::class)]
    #[ORM\JoinColumn(name: "id_forum", referencedColumnName: "id_forum")]
    private ?Forum $idForum = null;

    public function getIdCom(): ?int
    {
        return $this->idCom;
    }

    public function getDescrptifCom(): ?string
    {
        return $this->descrptifCom;
    }

    public function setDescrptifCom(string $descrptifCom): self
    {
        $this->descrptifCom = $descrptifCom;

        return $this;
    }

    public function getDateCom(): ?\DateTimeInterface
    {
        return $this->dateCom;
    }

    public function setDateCom(\DateTimeInterface $dateCom): self
    {
        $this->dateCom = $dateCom;

        return $this;
    }

    public function getIdForum(): ?Forum
    {
        return $this->idForum;
    }

    public function setIdForum(?Forum $idForum): self
    {
        $this->idForum = $idForum;

        return $this;
    }


}
