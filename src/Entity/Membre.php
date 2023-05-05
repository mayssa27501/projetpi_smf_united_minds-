<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\MembreRepository;
use Doctrine\DBAL\Types\Types;



#[ORM\Entity(repositoryClass: MembreRepository::class)]
class Membre
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ? int $idUser=null;

    
    #[ORM\Column(length : 255)]
    private ? string $nom=null;

    
    #[ORM\Column(length : 255)]
    private ? string $prenom=null;
    

    
    #[ORM\Column]
    private ? int $numTel=null;


    
    #[ORM\Column(length : 255)]
    private ? string $adresse=null;

    
    #[ORM\Column]
    private ? int $idRole=null;

   
    #[ORM\Column(length : 255)]
    private ? string $email=null;

    
    #[ORM\Column(length : 255)]
    private ? string $mdp=null;

   
    #[ORM\Column(length : 255)]
    private ? string $domaine=null;

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNumTel(): ?int
    {
        return $this->numTel;
    }

    public function setNumTel(int $numTel): self
    {
        $this->numTel = $numTel;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getIdRole(): ?int
    {
        return $this->idRole;
    }

    public function setIdRole(int $idRole): self
    {
        $this->idRole = $idRole;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getDomaine(): ?string
    {
        return $this->domaine;
    }

    public function setDomaine(string $domaine): self
    {
        $this->domaine = $domaine;

        return $this;
    }

    public function __toString()
    {
        return sprintf('%s %s', $this->nom, $this->prenom);
    }

}
