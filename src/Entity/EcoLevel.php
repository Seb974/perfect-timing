<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EcoLevelRepository")
 */
class EcoLevel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $level;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLevel(): ?float
    {
        return $this->level;
    }

    public function setLevel(float $level): self
    {
        $this->level = $level;

        return $this;
    }
}
