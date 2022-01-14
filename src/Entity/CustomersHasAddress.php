<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomersHasAddress
 *
 * @ORM\Table(name="customers_has_address", indexes={@ORM\Index(name="fk_customers_has_address_address1_idx", columns={"address_id"}), @ORM\Index(name="fk_customers_has_address_addressType1_idx", columns={"addressType_id"}), @ORM\Index(name="fk_customers_has_address_customers_idx", columns={"customers_id"})})
 * @ORM\Entity
 */
class CustomersHasAddress
{
    /**
     * @var \Address
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Address")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     * })
     */
    private $address;

    /**
     * @var \Addresstype
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Addresstype")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="addressType_id", referencedColumnName="id")
     * })
     */
    private $addresstype;

    /**
     * @var \Customers
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Customers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customers_id", referencedColumnName="id")
     * })
     */
    private $customers;


}
