<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plantilla
 *
 * @ORM\Table(name="plantilla")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\PlantillaRepository")
 */
class Plantilla
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="HOSPITAL_COD", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $hospitalCod = NULL;

    /**
     * @var int|null
     *
     * @ORM\Column(name="SALA_COD", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $salaCod = NULL;

    /**
     * @var int
     *
     * @ORM\Column(name="EMPLEADO_NO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $empleadoNo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="APELLIDO", type="string", length=40, nullable=true, options={"default"="NULL"})
     */
    private $apellido = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="FUNCION", type="string", length=30, nullable=true, options={"default"="NULL"})
     */
    private $funcion = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="TURNO", type="string", length=1, nullable=true, options={"default"="NULL"})
     */
    private $turno = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="SALARIO", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $salario = NULL;

    public function getHospitalCod(): ?int
    {
        return $this->hospitalCod;
    }

    public function setHospitalCod(?int $hospitalCod): self
    {
        $this->hospitalCod = $hospitalCod;

        return $this;
    }

    public function getSalaCod(): ?int
    {
        return $this->salaCod;
    }

    public function setSalaCod(?int $salaCod): self
    {
        $this->salaCod = $salaCod;

        return $this;
    }

    public function getEmpleadoNo(): ?int
    {
        return $this->empleadoNo;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(?string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getFuncion(): ?string
    {
        return $this->funcion;
    }

    public function setFuncion(?string $funcion): self
    {
        $this->funcion = $funcion;

        return $this;
    }

    public function getTurno(): ?string
    {
        return $this->turno;
    }

    public function setTurno(?string $turno): self
    {
        $this->turno = $turno;

        return $this;
    }

    public function getSalario(): ?int
    {
        return $this->salario;
    }

    public function setSalario(?int $salario): self
    {
        $this->salario = $salario;

        return $this;
    }


}
