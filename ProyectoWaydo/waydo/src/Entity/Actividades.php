<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Actividades
 *
 * @ORM\Table(name="actividades")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ActividadesRepository")
 */
class Actividades
{
    /**
     * @var int
     *
     * @ORM\Column(name="CODACTIVIDAD", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codactividad;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOMBRE", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $nombre = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="MUNICIPIO", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $municipio = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="DISTRITO", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $distrito = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="SENSEI", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $sensei = NULL;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRECIO", type="decimal", precision=5, scale=2, nullable=true, options={"default"="NULL"})
     */
    private $precio = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="INSCRITOS", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $inscritos = NULL;

    /**
     * @var int|null
     *
     * @ORM\Column(name="CUPO", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $cupo = NULL;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="FECHA_INICIO", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $fechaInicio = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="FECHA_FIN", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $fechaFin = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="EDICION", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $edicion = NULL;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DESCRIPCION", type="text", length=16777215, nullable=true, options={"default"="NULL"})
     */
    private $descripcion = 'NULL';

    public function getCodactividad(): ?int
    {
        return $this->codactividad;
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

    public function getMunicipio(): ?string
    {
        return $this->municipio;
    }

    public function setMunicipio(?string $municipio): self
    {
        $this->municipio = $municipio;

        return $this;
    }

    public function getDistrito(): ?string
    {
        return $this->distrito;
    }

    public function setDistrito(?string $distrito): self
    {
        $this->distrito = $distrito;

        return $this;
    }

    public function getSensei(): ?int
    {
        return $this->sensei;
    }

    public function setSensei(?int $sensei): self
    {
        $this->sensei = $sensei;

        return $this;
    }

    public function getPrecio(): ?string
    {
        return $this->precio;
    }

    public function setPrecio(?string $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getInscritos(): ?int
    {
        return $this->inscritos;
    }

    public function setInscritos(?int $inscritos): self
    {
        $this->inscritos = $inscritos;

        return $this;
    }

    public function getCupo(): ?int
    {
        return $this->cupo;
    }

    public function setCupo(?int $cupo): self
    {
        $this->cupo = $cupo;

        return $this;
    }

    public function getFechaInicio(): ?\DateTimeInterface
    {
        return $this->fechaInicio;
    }

    public function setFechaInicio(?\DateTimeInterface $fechaInicio): self
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    public function getFechaFin(): ?\DateTimeInterface
    {
        return $this->fechaFin;
    }

    public function setFechaFin(?\DateTimeInterface $fechaFin): self
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    public function getEdicion(): ?int
    {
        return $this->edicion;
    }

    public function setEdicion(?int $edicion): self
    {
        $this->edicion = $edicion;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }


}
