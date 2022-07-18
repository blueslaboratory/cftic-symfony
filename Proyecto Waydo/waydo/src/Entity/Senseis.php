<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Senseis
 *
 * @ORM\Table(name="senseis", indexes={@ORM\Index(name="DISTRITO", columns={"DISTRITO"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\SenseisRepository")
 */
class Senseis
{
    /**
     * @var string
     *
     * @ORM\Column(name="NICK", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nick;

    /**
     * @var string|null
     *
     * @ORM\Column(name="EMAIL", type="string", length=40, nullable=true, options={"default"="NULL"})
     */
    private $email = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="TELEFONO", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $telefono = NULL;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PASSWORD", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $password = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOMBRE", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $nombre = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="APELLIDOS", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $apellidos = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="FNAC", type="date", nullable=true, options={"default"="NULL"})
     */
    private $fnac = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="DESCRIPCION", type="text", length=16777215, nullable=true, options={"default"="NULL"})
     */
    private $descripcion = 'NULL';

    /**
     * @var \Localizacion|null
     *
     * @ORM\ManyToOne(targetEntity="Localizacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="DISTRITO", referencedColumnName="DISTRITO")
     * })
     */
    private $distrito;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Actividades", inversedBy="nickSa")
     * @ORM\JoinTable(name="senseis_actividades",
     *   joinColumns={
     *     @ORM\JoinColumn(name="NICK_SA", referencedColumnName="NICK")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="CODACTIVIDAD_SA", referencedColumnName="CODACTIVIDAD")
     *   }
     * )
     */
    private $codactividadSa;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->codactividadSa = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getNick(): ?string
    {
        return $this->nick;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelefono(): ?int
    {
        return $this->telefono;
    }

    public function setTelefono(?int $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(?string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getFnac(): ?\DateTimeInterface
    {
        return $this->fnac;
    }

    public function setFnac(?\DateTimeInterface $fnac): self
    {
        $this->fnac = $fnac;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getDistrito(): ?Localizacion
    {
        return $this->distrito;
    }

    public function setDistrito(?Localizacion $distrito): self
    {
        $this->distrito = $distrito;

        return $this;
    }

    /**
     * @return Collection<int, Actividades>
     */
    public function getCodactividadSa(): Collection
    {
        return $this->codactividadSa;
    }

    public function addCodactividadSa(Actividades $codactividadSa): self
    {
        if (!$this->codactividadSa->contains($codactividadSa)) {
            $this->codactividadSa[] = $codactividadSa;
        }

        return $this;
    }

    public function removeCodactividadSa(Actividades $codactividadSa): self
    {
        $this->codactividadSa->removeElement($codactividadSa);

        return $this;
    }

}
