<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomersHasAddress
 *
 * @ORM\Table(name="customers_has_address",
 *     indexes={
 *          @ORM\Index(name="fk_customers_has_address_address_id", columns={"address_id"}),
 *          @ORM\Index(name="fk_customers_has_address_addressType_id", columns={"addressType_id"}),
 *          @ORM\Index(name="fk_customers_has_address_customers_id", columns={"customers_id"})})
 * @ORM\Entity(repositoryClass=App\Repository\CustomersHasAddressRepository::class)
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
     * @ORM\OneToOne(targetEntity="AddressType")
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

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getAddresstype(): ?AddressType
    {
        return $this->addresstype;
    }

    public function setAddresstype(?AddressType $addresstype): self
    {
        $this->addresstype = $addresstype;

        return $this;
    }

    public function getCustomers(): ?Customers
    {
        return $this->customers;
    }

    public function setCustomers(?Customers $customers): self
    {
        $this->customers = $customers;

        return $this;
    }


}
