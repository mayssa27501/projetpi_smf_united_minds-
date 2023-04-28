<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FavorisRepository")
 * @ORM\Table(name="favoris")
 */
class Favoris
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(name="id_a", referencedColumnName="id")
     */
    private $id_a;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Oeuvre")
     * @ORM\JoinColumn(name="id_oeuvre", referencedColumnName="id")
     */
    private $id_oeuvre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getIdA(): ?User
    {
        return $this->id_a;
    }

    public function setIdA(?User $id_a): self
    {
        $this->id_a = $id_a;

        return $this;
    }

    public function getIdOeuvre(): ?Oeuvre
    {
        return $this->id_oeuvre;
    }

    public function setIdOeuvre(?Oeuvre $id_oeuvre): self
    {
        $this->id_oeuvre = $id_oeuvre;

        return $this;
    }
}
