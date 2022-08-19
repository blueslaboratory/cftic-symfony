<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Actividades
 *
 * @ORM\Table(name="actividades", indexes={@ORM\Index(name="DISTRITO", columns={"DISTRITO", "MUNICIPIO"}), @ORM\Index(name="SENSEI", columns={"SENSEI"})})
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
     * @ORM\Column(name="PRECIO", type="decimal", precision=5, scale=2, nullable=true, options={"default"=0})
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
     * @ORM\Column(name="FECHA_INICIO", type="datetime", nullable=true, options={"default"="0001-01-01 00:00:00"})
     */
    private $fechaInicio = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="FECHA_FIN", type="datetime", nullable=true, options={"default"="0001-01-01 00:00:00"})
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

    /**
     * @var \Localizacion|null
     *
     * @ORM\ManyToOne(targetEntity="Localizacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="DISTRITO", referencedColumnName="DISTRITO"),
     *   @ORM\JoinColumn(name="MUNICIPIO", referencedColumnName="MUNICIPIO")
     * })
     */
    private $distrito;

    /**
     * @var \Senseis|null
     *
     * @ORM\ManyToOne(targetEntity="Senseis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="SENSEI", referencedColumnName="NICK")
     * })
     */
    private $sensei;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Pupilos", mappedBy="codactividadPa")
     */
    private $nickPa;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Senseis", mappedBy="codactividadSa")
     */
    private $nickSa;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->nickPa = new \Doctrine\Common\Collections\ArrayCollection();
        $this->nickSa = new \Doctrine\Common\Collections\ArrayCollection();
    }

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

    public function getDistrito(): ?Localizacion
    {
        return $this->distrito;
    }

    public function setDistrito(?Localizacion $distrito): self
    {
        $this->distrito = $distrito;

        return $this;
    }

    public function getSensei(): ?Senseis
    {
        return $this->sensei;
    }

    public function setSensei(?Senseis $sensei): self
    {
        $this->sensei = $sensei;

        return $this;
    }

    /**
     * @return Collection<int, Pupilos>
     */
    public function getNickPa(): Collection
    {
        return $this->nickPa;
    }

    public function addNickPa(Pupilos $nickPa): self
    {
        if (!$this->nickPa->contains($nickPa)) {
            $this->nickPa[] = $nickPa;
            $nickPa->addCodactividadPa($this);
        }

        return $this;
    }

    public function removeNickPa(Pupilos $nickPa): self
    {
        if ($this->nickPa->removeElement($nickPa)) {
            $nickPa->removeCodactividadPa($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Senseis>
     */
    public function getNickSa(): Collection
    {
        return $this->nickSa;
    }

    public function addNickSa(Senseis $nickSa): self
    {
        if (!$this->nickSa->contains($nickSa)) {
            $this->nickSa[] = $nickSa;
            $nickSa->addCodactividadSa($this);
        }

        return $this;
    }

    public function removeNickSa(Senseis $nickSa): self
    {
        if ($this->nickSa->removeElement($nickSa)) {
            $nickSa->removeCodactividadSa($this);
        }

        return $this;
    }

}
