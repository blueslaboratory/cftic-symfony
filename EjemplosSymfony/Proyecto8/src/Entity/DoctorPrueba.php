<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DoctorPrueba
 *
 * @ORM\Table(name="doctor_prueba")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\DoctorPruebaRepository")
 */
class DoctorPrueba
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="HOSPITAL_COD", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $hospitalCod = NULL;

    /**
     * @var int
     *
     * @ORM\Column(name="DOCTOR_NO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $doctorNo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="APELLIDO", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $apellido = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ESPECIALIDAD", type="string", length=40, nullable=true, options={"default"="NULL"})
     */
    private $especialidad = 'NULL';

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

    public function getDoctorNo(): ?int
    {
        return $this->doctorNo;
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

    public function getEspecialidad(): ?string
    {
        return $this->especialidad;
    }

    public function setEspecialidad(?string $especialidad): self
    {
        $this->especialidad = $especialidad;

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
