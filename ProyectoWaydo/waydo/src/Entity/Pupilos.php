<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Repository\PupilosRepository;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Pupilos
 *
 * @ORM\Table(name="pupilos")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\PupilosRepository")
 */

#[ORM\Entity(repositoryClass: PupilosRepository::class)]
#[UniqueEntity(fields: ['nick'], message: 'There is already an account with this nick')]
class Pupilos implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NICK", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $nick = NULL;

    /**
     * @var string|null
     *
     * @ORM\Column(name="EMAIL", type="string", length=40, nullable=true, options={"default"="NULL"})
     */
    private $email = NULL;

    /**
     * @var int|null
     *
     * @ORM\Column(name="TELEFONO", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $telefono = NULL;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PASSWORD", type="string", length=128, nullable=true, options={"default"="NULL"})
     */
    private $password = NULL;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOMBRE", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $nombre = NULL;

    /**
     * @var string|null
     *
     * @ORM\Column(name="APELLIDOS", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $apellidos = NULL;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="FNAC", type="date", nullable=true, options={"default"="NULL"})
     */
    private $fnac = NULL;

    /**
     * @var string|null
     *
     * @ORM\Column(name="MUNICIPIO", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $municipio = NULL;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DISTRITO", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $distrito = NULL;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DESCRIPCION", type="text", length=16777215, nullable=true, options={"default"="NULL"})
     */
    private $descripcion = NULL;

    #[ORM\Column]
    private array $roles = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNick(): ?string
    {
        return $this->nick;
    }

    public function setNick(?string $nick): self
    {
        $this->nick = $nick;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->nick;
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

    /**
     * @see PasswordAuthenticatedUserInterface
     */
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

    public function getMunicipio(): ?string
    {
        return $this->municipio;
    }

    public function setMunicipio(?string $municipio): self
    {
        $this->municipio = $municipio;

        return $this;
    }

    public function getDistrito(): ?string
    {
        return $this->distrito;
    }

    public function setDistrito(?string $distrito): self
    {
        $this->distrito = $distrito;

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

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
