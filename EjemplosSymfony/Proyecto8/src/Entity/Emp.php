<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Emp
 *
 * @ORM\Table(name="emp")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\EmpRepository")
 */
class Emp
{
    /**
     * @var int
     *
     * @ORM\Column(name="EMP_NO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $empNo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="APELLIDO", type="string", length=40, nullable=true, options={"default"="NULL"})
     */
    private $apellido = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="OFICIO", type="string", length=40, nullable=true, options={"default"="NULL"})
     */
    private $oficio = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="DIR", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $dir = NULL;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="FECHA_ALT", type="date", nullable=true, options={"default"="NULL"})
     */
    private $fechaAlt = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="SALARIO", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $salario = NULL;

    /**
     * @var int|null
     *
     * @ORM\Column(name="COMISION", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $comision = NULL;

    /**
     * @var int|null
     *
     * @ORM\Column(name="DEPT_NO", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $deptNo = NULL;

    public function getEmpNo(): ?int
    {
        return $this->empNo;
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

    public function getOficio(): ?string
    {
        return $this->oficio;
    }

    public function setOficio(?string $oficio): self
    {
        $this->oficio = $oficio;

        return $this;
    }

    public function getDir(): ?int
    {
        return $this->dir;
    }

    public function setDir(?int $dir): self
    {
        $this->dir = $dir;

        return $this;
    }

    public function getFechaAlt(): ?\DateTimeInterface
    {
        return $this->fechaAlt;
    }

    public function setFechaAlt(?\DateTimeInterface $fechaAlt): self
    {
        $this->fechaAlt = $fechaAlt;

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

    public function getComision(): ?int
    {
        return $this->comision;
    }

    public function setComision(?int $comision): self
    {
        $this->comision = $comision;

        return $this;
    }

    public function getDeptNo(): ?int
    {
        return $this->deptNo;
    }

    public function setDeptNo(?int $deptNo): self
    {
        $this->deptNo = $deptNo;

        return $this;
    }


}
