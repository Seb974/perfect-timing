<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActivityRepository")
 */
class Activity
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\hostPlace", mappedBy="activity")
     */
    private $hostPlace;

    public function __construct()
    {
        $this->hostPlace = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|hostPlace[]
     */
    public function getHostPlace(): Collection
    {
        return $this->hostPlace;
    }

    public function addHostPlace(hostPlace $hostPlace): self
    {
        if (!$this->hostPlace->contains($hostPlace)) {
            $this->hostPlace[] = $hostPlace;
            $hostPlace->setActivity($this);
        }

        return $this;
    }

    public function removeHostPlace(hostPlace $hostPlace): self
    {
        if ($this->hostPlace->contains($hostPlace)) {
            $this->hostPlace->removeElement($hostPlace);
            // set the owning side to null (unless already changed)
            if ($hostPlace->getActivity() === $this) {
                $hostPlace->setActivity(null);
            }
        }

        return $this;
    }
}
