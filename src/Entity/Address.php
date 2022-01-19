<?php

namespace App\Entity;

use App\Interfaces\BaseInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity(repositoryClass=App\Repository\AdressRepository::class)
 */
class Address implements BaseInterface
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
     * @var string|null
     *
     * @ORM\Column(name="firstname", type="string", length=45, nullable=true)
     */
    private $firstname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lastname", type="string", length=45, nullable=true)
     */
    private $lastname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adr1", type="string", length=45, nullable=true)
     */
    private $adr1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adr2", type="string", length=45, nullable=true)
     */
    private $adr2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="zcode", type="string", length=8, nullable=true)
     */
    private $zcode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="town", type="string", length=45, nullable=true)
     */
    private $town;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->firstname.' '.$this->lastname;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getAdr1(): ?string
    {
        return $this->adr1;
    }

    public function setAdr1(?string $adr1): self
    {
        $this->adr1 = $adr1;

        return $this;
    }

    public function getAdr2(): ?string
    {
        return $this->adr2;
    }

    public function setAdr2(?string $adr2): self
    {
        $this->adr2 = $adr2;

        return $this;
    }

    public function getZcode(): ?string
    {
        return $this->zcode;
    }

    public function setZcode(?string $zcode): self
    {
        $this->zcode = $zcode;

        return $this;
    }

    public function getTown(): ?string
    {
        return $this->town;
    }

    public function setTown(?string $town): self
    {
        $this->town = $town;

        return $this;
    }


}
