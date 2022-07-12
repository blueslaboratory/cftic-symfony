<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fichacliente
 *
 * @ORM\Table(name="fichacliente")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ClienteRepository")
 */
class Fichacliente
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOMBRE", type="string", length=30, nullable=true, options={"default"="NULL"})
     */
    private $nombre = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="APELLIDO1", type="string", length=30, nullable=true, options={"default"="NULL"})
     */
    private $apellido1 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="APELLIDO2", type="string", length=30, nullable=true, options={"default"="NULL"})
     */
    private $apellido2 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="DOMICILIO", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $domicilio = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="CIUDAD", type="string", length=30, nullable=true, options={"default"="NULL"})
     */
    private $ciudad = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="SEXO", type="string", length=10, nullable=true, options={"default"="NULL"})
     */
    private $sexo = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="SO", type="string", length=40, nullable=true, options={"default"="NULL"})
     */
    private $so = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="COMENTARIO", type="text", length=16777215, nullable=true, options={"default"="NULL"})
     */
    private $comentario = 'NULL';

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

    public function getApellido1(): ?string
    {
        return $this->apellido1;
    }

    public function setApellido1(?string $apellido1): self
    {
        $this->apellido1 = $apellido1;

        return $this;
    }

    public function getApellido2(): ?string
    {
        return $this->apellido2;
    }

    public function setApellido2(?string $apellido2): self
    {
        $this->apellido2 = $apellido2;

        return $this;
    }

    public function getDomicilio(): ?string
    {
        return $this->domicilio;
    }

    public function setDomicilio(?string $domicilio): self
    {
        $this->domicilio = $domicilio;

        return $this;
    }

    public function getCiudad(): ?string
    {
        return $this->ciudad;
    }

    public function setCiudad(?string $ciudad): self
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(?string $sexo): self
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function getSo(): ?string
    {
        return $this->so;
    }

    public function setSo(?string $so): self
    {
        $this->so = $so;

        return $this;
    }

    public function getComentario(): ?string
    {
        return $this->comentario;
    }

    public function setComentario(?string $comentario): self
    {
        $this->comentario = $comentario;

        return $this;
    }


}
