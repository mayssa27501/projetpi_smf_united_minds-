<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity
 */
class Categorie
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_categorie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    #[Assert\NotBlank(message:" *Champ Obligatoire")]
    #[Assert\Length(min:10,max:20,minMessage:" *description ne contient pas le minimum des caractères.")]
    #[Assert\Regex(
        pattern: '/\d/',
        match: false,
        message: 'le descriptif ne peut  pas contenir des chiffres',
    )]
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptif", type="string", length=255, nullable=false)
     */
    #[Assert\NotBlank(message:" *Champ Obligatoire")]
    #[Assert\Length(min:10,max:20,minMessage:" *description ne contient pas le minimum des caractères.")]
    #[Assert\Regex(
        pattern: '/\d/',
        match: false,
        message: 'le descriptif ne peut  pas contenir des chiffres',
    )]
    private $descriptif;

    public function getIdCategorie(): ?int
    {
        return $this->idCategorie;
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

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(string $descriptif): self
    {
        $this->descriptif = $descriptif;

        return $this;
    }


}
