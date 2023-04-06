<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dept
 *
 * @ORM\Table(name="dept")
 * @ORM\Entity
 */
class Dept
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dnombre", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $dnombre = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="loc", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $loc = 'NULL';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDnombre(): ?string
    {
        return $this->dnombre;
    }

    public function setDnombre(?string $dnombre): self
    {
        $this->dnombre = $dnombre;

        return $this;
    }

    public function getLoc(): ?string
    {
        return $this->loc;
    }

    public function setLoc(?string $loc): self
    {
        $this->loc = $loc;

        return $this;
    }


}
