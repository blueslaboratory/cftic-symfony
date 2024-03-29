<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Localizacion
 *
 * @ORM\Table(name="localizacion")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\LocalizacionRepository")
 */
class Localizacion
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="PAIS", type="string", length=30, nullable=true, options={"default"="NULL"})
     */
    private $pais = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="COMUNIDAD", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $comunidad = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="MUNICIPIO", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $municipio;

    /**
     * @var string
     *
     * @ORM\Column(name="DISTRITO", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $distrito;

    public function getPais(): ?string
    {
        return $this->pais;
    }

    public function setPais(?string $pais): self
    {
        $this->pais = $pais;

        return $this;
    }

    public function getComunidad(): ?string
    {
        return $this->comunidad;
    }

    public function setComunidad(?string $comunidad): self
    {
        $this->comunidad = $comunidad;

        return $this;
    }

    public function getMunicipio(): ?string
    {
        return $this->municipio;
    }

    public function getDistrito(): ?string
    {
        return $this->distrito;
    }


}
