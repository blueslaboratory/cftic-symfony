<?php

namespace App\Entity;

use App\Repository\DeptRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeptRepository::class)]
class Dept
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $dnombre;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $loc;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDnombre(): ?string
    {
        return $this->dnombre;
    }

    public function setDnombre(?string $dnombre): self
    {
        $this->dnombre = $dnombre;

        return $this;
    }

    public function getLoc(): ?string
    {
        return $this->loc;
    }

    public function setLoc(?string $loc): self
    {
        $this->loc = $loc;

        return $this;
    }
}
