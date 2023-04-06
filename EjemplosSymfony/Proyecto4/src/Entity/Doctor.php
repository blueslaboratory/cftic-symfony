<?php

namespace App\Entity;

use App\Repository\DoctorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DoctorRepository::class)]
class Doctor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $hospital_cod;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $apellido;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $especialidad;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $salario;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHospitalCod(): ?int
    {
        return $this->hospital_cod;
    }

    public function setHospitalCod(?int $hospital_cod): self
    {
        $this->hospital_cod = $hospital_cod;

        return $this;
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
