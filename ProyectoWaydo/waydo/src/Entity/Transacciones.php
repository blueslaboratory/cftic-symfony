<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Transacciones
 *
 * @ORM\Table(name="transacciones")
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
     * @var int|null
     *
     * @ORM\Column(name="CODACTIVIDAD", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $codactividad = NULL;

    /**
     * @var int|null
     *
     * @ORM\Column(name="EMISOR", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $emisor = NULL;

    /**
     * @var int|null
     *
     * @ORM\Column(name="RECEPTOR", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $receptor = NULL;

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

    public function getCodtransaccion(): ?int
    {
        return $this->codtransaccion;
    }

    public function getCodactividad(): ?int
    {
        return $this->codactividad;
    }

    public function setCodactividad(?int $codactividad): self
    {
        $this->codactividad = $codactividad;

        return $this;
    }

    public function getEmisor(): ?int
    {
        return $this->emisor;
    }

    public function setEmisor(?int $emisor): self
    {
        $this->emisor = $emisor;

        return $this;
    }

    public function getReceptor(): ?int
    {
        return $this->receptor;
    }

    public function setReceptor(?int $receptor): self
    {
        $this->receptor = $receptor;

        return $this;
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


}
