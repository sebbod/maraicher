<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="address", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class Address
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


}
