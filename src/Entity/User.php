<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Mapping\ClassMetadata;


#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'il existe déjà un compte avec cet email
')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['users'])]


    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    #[Assert\NotBlank(message:"Email est obligatoire")]
    #[Assert\Email(message:"Email n'est pas valide")] 
    #[Groups(['users'])]


    private ?string $email = null;

    #[ORM\Column]
    #[Assert\NotBlank(message:"Role est obligatoire")]
    #[Groups(['users'])]

    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    #[Groups(['users'])]


    private ?string $password = null;
    protected $recaptcha;
    protected $isActive;
    

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Nom est obligatoire")]
    #[Groups(['users'])]



    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Prenom est obligatoire")]
    #[Groups(['users'])]

    private ?string $Prenom = null;

    #[ORM\Column]
    #[Assert\NotBlank(message:"Telephone est obligatoire")]
    #[Assert\Regex(pattern: "/^(00216|216|0)[0-9]{8}$/", message: "Telephone n'est pas valide")]
    #[Groups(['users'])]



    private ?string $Telephone = null;

    #[ORM\Column]
    #[Assert\NotBlank(message:"Cin est obligatoire  ")]
    #[Assert\Regex(pattern: "/^[0-9]{8}$/", message: "Cin n'est pas valide")]
    #[Groups(['users'])]

    private ?string $Cin = null;

    #[ORM\Column]
    private ?bool $IsVerified = false;
    #[ORM\Column]
    private ?bool $EtatCompte = false;
    #[ORM\Column(type:'boolean')]
    private ?bool $isBlocked = false;


   

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
       // $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->Telephone;
    }

    public function setTelephone(int $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getCin(): ?string
    {
        return $this->Cin;
    }

    public function setCin(int $Cin): self
    {
        $this->Cin = $Cin;

        return $this;
    }
    public function getrecaptcha()
    {
        return $this->recaptcha;
    }
    public function setrecaptcha($recaptcha)
    {
        $this->recaptcha = $recaptcha;
    }

    // set IsActive
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }
    // get IsActive
    public function getIsActive()
    {
        return $this->isActive;
    }
/*
    public function isIsVerified(): ?bool
    {
        return $this->IsVerified;
    }

    public function setIsVerified(bool $IsVerified): self
    {
        $this->IsVerified = $IsVerified;

        return $this;
    }*/
  
public function IsVerified(): bool
{
    return $this->IsVerified;
}

public function setIsVerified(bool $isVerified): self
{
    $this->IsVerified = $isVerified;

    return $this;
}
    
    // get etatcompte
    public function getEtatCompte(): ?bool
    {
        return $this->EtatCompte;
    }
    // set etatcompte
    public function setEtatCompte($EtatCompte)
    {
        $this->EtatCompte = $EtatCompte;
    }
    // get isBlocked
   
    // set isBlocked
    public function setIsBlocked($isBlocked)
    {
        $this->isBlocked = $isBlocked;
    }
    // isblocked
    public function isBlocked(): bool
    {
        return $this->isBlocked;
    }
    
    
    
    
}
