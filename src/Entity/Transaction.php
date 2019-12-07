<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TransactionRepository")
 */
class Transaction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $username;

    /**
     * @ORM\Column(type="text")
     */
    private $motivation;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $dateSelected;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\HostPlace", inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $relation;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $state;

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

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getMotivation(): ?string
    {
        return $this->motivation;
    }

    public function setMotivation(string $motivation): self
    {
        $this->motivation = $motivation;

        return $this;
    }

    public function getDateSelected(): ?string
    {
        return $this->dateSelected;
    }

    public function setDateSelected(string $dateSelected): self
    {
        $this->dateSelected = $dateSelected;

        return $this;
    }

    public function getRelation(): ?HostPlace
    {
        return $this->relation;
    }

    public function setRelation(?HostPlace $relation): self
    {
        $this->relation = $relation;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }
}
