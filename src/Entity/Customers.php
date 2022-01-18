<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
// *          @ORM\UniqueConstraint(name="name_UNIQUE", columns={"name"}),
// *          @ORM\UniqueConstraint(name="email_UNIQUE", columns={"email"})
/**
 * Customers
 *
 * @ORM\Table(name="customers",
 *     uniqueConstraints={
 *          @ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})
 *                      }
 *     )
 * @ORM\Entity(repositoryClass=App\Repository\CustomersRepository::class)
 * @UniqueEntity("name")
 * @UniqueEntity("email")
 */
class Customers
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     * @Assert\Unique(message="Le nom {{ value }} est déjà utilisé par une autre client")
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone", type="string", length=12, nullable=true)
     */
    private $phone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mobile", type="string", length=12, nullable=true)
     */
    private $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=120, nullable=false)
     * @Assert\Unique(message="L'email {{ value }} est déjà utilisé par une autre client")
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="siret", type="string", length=14, nullable=true, options={"fixed"=true})
     */
    private $siret;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    public function setMobile(?string $mobile): self
    {
        $this->mobile = $mobile;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(?string $siret): self
    {
        $this->siret = $siret;

        return $this;
    }


}
