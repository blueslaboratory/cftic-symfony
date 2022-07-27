<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Peliculas
 *
 * @ORM\Table(name="peliculas")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\PeliculasRepository")
 */
class Peliculas
{
    /**
     * @var int
     *
     * @ORM\Column(name="IDPELICULA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpelicula;

    /**
     * @var int|null
     *
     * @ORM\Column(name="IDDISTRIBUIDOR", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $iddistribuidor = NULL;

    /**
     * @var int|null
     *
     * @ORM\Column(name="IDGENERO", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idgenero = NULL;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TITULO", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $titulo = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="IDNACIONALIDAD", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idnacionalidad = NULL;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ARGUMENTO", type="string", length=1550, nullable=true, options={"default"="NULL"})
     */
    private $argumento = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="FOTO", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $foto = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="FECHA_ESTRENO", type="date", nullable=true, options={"default"="NULL"})
     */
    private $fechaEstreno = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ACTORES", type="string", length=1550, nullable=true, options={"default"="NULL"})
     */
    private $actores = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="DIRECTOR", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $director = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="DURACION", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $duracion = NULL;

    /**
     * @var int|null
     *
     * @ORM\Column(name="PRECIO", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $precio = NULL;

    public function getIdpelicula(): ?int
    {
        return $this->idpelicula;
    }

    public function getIddistribuidor(): ?int
    {
        return $this->iddistribuidor;
    }

    public function setIddistribuidor(?int $iddistribuidor): self
    {
        $this->iddistribuidor = $iddistribuidor;

        return $this;
    }

    public function getIdgenero(): ?int
    {
        return $this->idgenero;
    }

    public function setIdgenero(?int $idgenero): self
    {
        $this->idgenero = $idgenero;

        return $this;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(?string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getIdnacionalidad(): ?int
    {
        return $this->idnacionalidad;
    }

    public function setIdnacionalidad(?int $idnacionalidad): self
    {
        $this->idnacionalidad = $idnacionalidad;

        return $this;
    }

    public function getArgumento(): ?string
    {
        return $this->argumento;
    }

    public function setArgumento(?string $argumento): self
    {
        $this->argumento = $argumento;

        return $this;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(?string $foto): self
    {
        $this->foto = $foto;

        return $this;
    }

    public function getFechaEstreno(): ?\DateTimeInterface
    {
        return $this->fechaEstreno;
    }

    public function setFechaEstreno(?\DateTimeInterface $fechaEstreno): self
    {
        $this->fechaEstreno = $fechaEstreno;

        return $this;
    }

    public function getActores(): ?string
    {
        return $this->actores;
    }

    public function setActores(?string $actores): self
    {
        $this->actores = $actores;

        return $this;
    }

    public function getDirector(): ?string
    {
        return $this->director;
    }

    public function setDirector(?string $director): self
    {
        $this->director = $director;

        return $this;
    }

    public function getDuracion(): ?int
    {
        return $this->duracion;
    }

    public function setDuracion(?int $duracion): self
    {
        $this->duracion = $duracion;

        return $this;
    }

    public function getPrecio(): ?int
    {
        return $this->precio;
    }

    public function setPrecio(?int $precio): self
    {
        $this->precio = $precio;

        return $this;
    }


}
