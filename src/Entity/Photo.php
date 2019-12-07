<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PhotoRepository")
 */
class Photo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\HostPlace", mappedBy="photo", cascade={"persist", "remove"})
     */
    private $hostPlace;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getHostPlace(): ?HostPlace
    {
        return $this->hostPlace;
    }

    public function setHostPlace(?HostPlace $hostPlace): self
    {
        $this->hostPlace = $hostPlace;

        // set (or unset) the owning side of the relation if necessary
        $newPhoto = null === $hostPlace ? null : $this;
        if ($hostPlace->getPhoto() !== $newPhoto) {
            $hostPlace->setPhoto($newPhoto);
        }

        return $this;
    }
}
