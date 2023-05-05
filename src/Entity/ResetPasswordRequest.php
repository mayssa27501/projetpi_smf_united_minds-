<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ResetPasswordRequestRepository;
use Doctrine\DBAL\Types\Types;


#[ORM\Entity(repositoryClass: ResetPasswordRequestRepository::class)]
class ResetPasswordRequest
{
   
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ? int $id=null;

    
    #[ORM\Column]
    private ? int $userId=null;

    
    #[ORM\Column(length : 255)]
    private ? string $selector=null;

    
    #[ORM\Column(length : 255)]
    private ? string $hashedToken=null;

    
    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTime $requestedAt = null;

    
    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTime $expiresAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getSelector(): ?string
    {
        return $this->selector;
    }

    public function setSelector(string $selector): self
    {
        $this->selector = $selector;

        return $this;
    }

    public function getHashedToken(): ?string
    {
        return $this->hashedToken;
    }

    public function setHashedToken(string $hashedToken): self
    {
        $this->hashedToken = $hashedToken;

        return $this;
    }

    public function getRequestedAt(): ?\DateTimeImmutable
    {
        return $this->requestedAt;
    }

    public function setRequestedAt(\DateTimeImmutable $requestedAt): self
    {
        $this->requestedAt = $requestedAt;

        return $this;
    }

    public function getExpiresAt(): ?\DateTimeImmutable
    {
        return $this->expiresAt;
    }

    public function setExpiresAt(\DateTimeImmutable $expiresAt): self
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }


}
