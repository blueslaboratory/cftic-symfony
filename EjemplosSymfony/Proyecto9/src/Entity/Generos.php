<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Generos
 *
 * @ORM\Table(name="generos")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\GenerosRepository")
 */
class Generos
{
    /**
     * @var int
     *
     * @ORM\Column(name="IDGENERO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idgenero;

    /**
     * @var string|null
     *
     * @ORM\Column(name="GENERO", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $genero = 'NULL';

    public function getIdgenero(): ?int
    {
        return $this->idgenero;
    }

    public function getGenero(): ?string
    {
        return $this->genero;
    }

    public function setGenero(?string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }


}
