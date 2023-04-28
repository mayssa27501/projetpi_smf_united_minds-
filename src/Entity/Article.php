<?php
namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "ce champ est obligatoire")]
    #[Assert\Regex(
        pattern: '/\d/',
        match: false,
        message: 'le nom ne peut pas contenir des chiffres',
    )]
    private ?string $titre_artic = null;

    #[ORM\Column(length: 255)]
    private ?string $theme_artic = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_ajout_artic = null;

    #[ORM\Column(length: 255)]
    private ?string $descriptif_artic = null;

    #[ORM\ManyToOne(targetEntity: CategorieArticle::class, inversedBy: 'articles')]
    #[ORM\JoinColumn(name: 'categorieArticle', referencedColumnName: 'id', nullable: false)]
    private ?CategorieArticle $categorieArticle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreArtic(): ?string
    {
        return $this->titre_artic;
    }

    public function setTitreArtic(string $titre_artic): self
    {
        $this->titre_artic = $titre_artic;

        return $this;
    }

    public function getThemeArtic(): ?string
    {
        return $this->theme_artic;
    }

    public function setThemeArtic(string $theme_artic): self
    {
        $this->theme_artic = $theme_artic;

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

    public function getCategorieArticle(): ?CategorieArticle
    {
        return $this->categorieArticle;
    }

    public function setCategorieArticle(?CategorieArticle $categorieArticle): self
    {
        $this->categorieArticle = $categorieArticle;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
