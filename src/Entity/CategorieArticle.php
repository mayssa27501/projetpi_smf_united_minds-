<?php

namespace App\Entity;

use App\Repository\CategorieArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieArticleRepository::class)]
class CategorieArticle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_cat_artic = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_ajout_artic = null;

    #[ORM\Column(length: 255)]
    private ?string $descriptif_artic = null;

    #[ORM\OneToMany(mappedBy: 'id_cat', targetEntity: Article::class)]
    private Collection $articles;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCatArtic(): ?string
    {
        return $this->nom_cat_artic;
    }

    public function setNomCatArtic(string $nom_cat_artic): self
    {
        $this->nom_cat_artic = $nom_cat_artic;

        return $this;
    }

    public function getDateAjoutArtic(): ?\DateTimeInterface
    {
        return $this->date_ajout_artic;
    }

    public function setDateAjoutArtic(\DateTimeInterface $date_ajout_artic): self
    {
        $this->date_ajout_artic = $date_ajout_artic;

        return $this;
    }

    public function getDescriptifArtic(): ?string
    {
        return $this->descriptif_artic;
    }

    public function setDescriptifArtic(string $descriptif_artic): self
    {
        $this->descriptif_artic = $descriptif_artic;

        return $this;
    }
    public function __toString(): string
    {
        return $this->nom_cat_artic;
    }
    
   
}
