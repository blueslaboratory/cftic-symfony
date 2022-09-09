<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SenseisActividades
 *
 * @ORM\Table(name="senseis_actividades")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\SenseisActividadesRepository")
 */
class SenseisActividades
{
    /**
     * @var int
     *
     * @ORM\Column(name="NICK_SA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $nickSa;

    /**
     * @var int
     *
     * @ORM\Column(name="CODACTIVIDAD_SA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codactividadSa;

    public function getNickSa(): ?int
    {
        return $this->nickSa;
    }

    public function getCodactividadSa(): ?int
    {
        return $this->codactividadSa;
    }


}
