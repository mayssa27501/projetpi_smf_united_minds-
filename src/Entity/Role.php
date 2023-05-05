<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\RoleRepository;



#[ORM\Entity(repositoryClass: RoleRepository::class)]
class Role
{
   
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ? int $idRole=null;

    
    #[ORM\Column(length : 255)]
    private ? string $type=null;

    public function getIdRole(): ?int
    {
        return $this->idRole;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

   


}
