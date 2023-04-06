<?php

namespace App\Entity;

use App\Repository\HospitalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HospitalRepository::class)]
class Hospital
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $nombre;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $direccion;

    #[ORM\Column(type: 'string', length: 14, nullable: true)]
    private $telefono;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $num_cama;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(?string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getNumCama(): ?int
    {
        return $this->num_cama;
    }

    public function setNumCama(?int $num_cama): self
    {
        $this->num_cama = $num_cama;

        return $this;
    }
}
