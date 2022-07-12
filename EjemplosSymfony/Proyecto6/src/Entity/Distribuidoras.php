<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Distribuidoras
 *
 * @ORM\Table(name="distribuidoras")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\DistribuidorasRepository")
 */
class Distribuidoras
{
    /**
     * @var string
     *
     * @ORM\Column(name="DISTRIBUIDORA", type="string", length=40, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $distribuidora;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IMAGEN", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $imagen = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="INTERNET", type="string", length=35, nullable=true, options={"default"="NULL"})
     */
    private $internet = 'NULL';

    public function getDistribuidora(): ?string
    {
        return $this->distribuidora;
    }

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(?string $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getInternet(): ?string
    {
        return $this->internet;
    }

    public function setInternet(?string $internet): self
    {
        $this->internet = $internet;

        return $this;
    }


}
