<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transacciones
 *
 * @ORM\Table(name="transacciones", indexes={@ORM\Index(name="CODACTIVIDAD", columns={"CODACTIVIDAD"}), @ORM\Index(name="EMISOR", columns={"EMISOR"}), @ORM\Index(name="RECEPTOR", columns={"RECEPTOR"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\TransaccionesRepository")
 */
class Transacciones
{
    /**
     * @var int
     *
     * @ORM\Column(name="CODTRANSACCION", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codtransaccion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CANTIDAD", type="decimal", precision=5, scale=2, nullable=true, options={"default"="NULL"})
     */
    private $cantidad = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ESTADO", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $estado = 'NULL';

    /**
     * @var \Pupilos|null
     *
     * @ORM\ManyToOne(targetEntity="Pupilos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="EMISOR", referencedColumnName="NICK")
     * })
     */
    private $emisor;

    /**
     * @var \Actividades|null
     *
     * @ORM\ManyToOne(targetEntity="Actividades")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CODACTIVIDAD", referencedColumnName="CODACTIVIDAD")
     * })
     */
    private $codactividad;

    /**
     * @var \Senseis|null
     *
     * @ORM\ManyToOne(targetEntity="Senseis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="RECEPTOR", referencedColumnName="NICK")
     * })
     */
    private $receptor;

    public function getCodtransaccion(): ?int
    {
        return $this->codtransaccion;
    }

    public function getCantidad(): ?string
    {
        return $this->cantidad;
    }

    public function setCantidad(?string $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(?string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getEmisor(): ?Pupilos
    {
        return $this->emisor;
    }

    public function setEmisor(?Pupilos $emisor): self
    {
        $this->emisor = $emisor;

        return $this;
    }

    public function getCodactividad(): ?Actividades
    {
        return $this->codactividad;
    }

    public function setCodactividad(?Actividades $codactividad): self
    {
        $this->codactividad = $codactividad;

        return $this;
    }

    public function getReceptor(): ?Senseis
    {
        return $this->receptor;
    }

    public function setReceptor(?Senseis $receptor): self
    {
        $this->receptor = $receptor;

        return $this;
    }


}
