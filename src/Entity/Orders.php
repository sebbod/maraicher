<?php

namespace App\Entity;

use App\Interfaces\BaseInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Orders
 *
 * @ORM\Table(name="orders",
 *     indexes={
 *          @ORM\Index(name="fk_orders_customers_id", columns={"customers_id"}),
 *          @ORM\Index(name="fk_orders_states_id", columns={"states_id"})
 *     })
 * @ORM\Entity(repositoryClass=App\Repository\OrdersRepository::class)
 */
class Orders implements BaseInterface
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
     * @ORM\Column(name="dateCreate", type="datetime", nullable=false)
     *
     */
    private $datecreate;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="OrdersHasStocks", mappedBy="orders")
     */
    private $stocks;

    /**
     * @ORM\ManyToOne(targetEntity=Customers::class, inversedBy="Orders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customers;

    /**
     * @ORM\ManyToOne(targetEntity=OrderStates::class, inversedBy="Orders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $states;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stocks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        $format = "Orders (id: %s, date: %s, client: %s, etat: %s)\n";
        return sprintf($format, $this->id, $this->datecreate,
            $this->getCustomers()->getName(),
            $this->getStates()->getName());
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->__toString();
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

}
