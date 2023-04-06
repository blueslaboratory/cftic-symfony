<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hospital
 *
 * @ORM\Table(name="hospital")
 * @ORM\Entity
 */
class Hospital
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $nombre = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="direccion", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $direccion = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="telefono", type="string", length=14, nullable=true, options={"default"="NULL"})
     */
    private $telefono = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="num_cama", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $numCama = NULL;

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
        return $this->numCama;
    }

    public function setNumCama(?int $numCama): self
    {
        $this->numCama = $numCama;

        return $this;
    }


}
