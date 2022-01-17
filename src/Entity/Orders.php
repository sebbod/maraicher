<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity(repositoryClass=OrdersRepository::class)
 */
class Orders
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreate", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $datecreate = 'CURRENT_TIMESTAMP';

    /**
     * @var \Customers
     *
     * @ORM\OneToOne(targetEntity="Customers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customers_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $customers;

    /**
     * @var \OrderStates
     *
     * @ORM\OneToOne(targetEntity="OrderStates")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="states_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $states;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="OrdersHasStocks", mappedBy="orders")
     */
    private $stocks;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stocks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatecreate(): ?\DateTimeInterface
    {
        return $this->datecreate;
    }

    public function setDatecreate(\DateTimeInterface $datecreate): self
    {
        $this->datecreate = $datecreate;

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

    public function getStates(): ?OrderStates
    {
        return $this->states;
    }

    public function setStates(?OrderStates $states): self
    {
        $this->states = $states;

        return $this;
    }

    /**
     * @return Collection|Stocks[]
     */
    public function getStocks(): Collection
    {
        return $this->stocks;
    }

    public function addStock(OrdersHasStocks $stock): self
    {
        if (!$this->stocks->contains($stock)) {
            $this->stocks[] = $stock;
        }

        return $this;
    }

    public function removeStock(OrdersHasStocks $stock): self
    {
        $this->stocks->removeElement($stock);

        return $this;
    }

}
