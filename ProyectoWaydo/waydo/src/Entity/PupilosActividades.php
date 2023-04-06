<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PupilosActividades
 *
 * @ORM\Table(name="pupilos_actividades")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\PupilosActividadesRepository")
 */
class PupilosActividades
{
    /**
     * @var int
     *
     * @ORM\Column(name="NICK_PA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $nickPa;

    /**
     * @var int
     *
     * @ORM\Column(name="CODACTIVIDAD_PA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codactividadPa;

    public function getNickPa(): ?int
    {
        return $this->nickPa;
    }

    public function getCodactividadPa(): ?int
    {
        return $this->codactividadPa;
    }


}
