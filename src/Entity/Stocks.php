<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Stocks
 *
 * @ORM\Table(name="stocks", indexes={
 *     @ORM\Index(name="fk_stocks_products1_idx", columns={"products_id"}),
 *     @ORM\Index(name="fk_stocks_units1_idx", columns={"units_id"})})
 * @ORM\Entity
 */
class Stocks
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
     * @var int
     *
     * @ORM\Column(name="qty", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $qty;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=6, scale=2, nullable=false, options={"comment"="prix par defaut du produit pour son unités de vente"})
     */
    private $price;

    /**
     * @var \Products
     *
     * @ORM\ManyToOne(targetEntity="Products")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="products_id", referencedColumnName="id")
     * })
     */
    private $products;

    /**
     * @var \Units
     *
     * @ORM\ManyToOne(targetEntity="Units")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="units_id", referencedColumnName="id")
     * })
     */
    private $units;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Orders", mappedBy="stocks")
     */
    private $orders;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orders = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQty(): ?int
    {
        return $this->qty;
    }

    public function setQty(int $qty): self
    {
        $this->qty = $qty;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getProducts(): ?Products
    {
        return $this->products;
    }

    public function setProducts(?Products $products): self
    {
        $this->products = $products;

        return $this;
    }

    public function getUnits(): ?Units
    {
        return $this->units;
    }

    public function setUnits(?Units $units): self
    {
        $this->units = $units;

        return $this;
    }

    /**
     * @return Collection|Orders[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    /**
     * @param OrdersHasStocks $order
     * @return $this
     */
    public function addOrder(OrdersHasStocks $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->addStock($this);
        }

        return $this;
    }

    /**
     * @param OrdersHasStocks $order
     * @return $this
     */
    public function removeOrder(OrdersHasStocks $order): self
    {
        if ($this->orders->removeElement($order)) {
            $order->removeStock($this);
        }

        return $this;
    }

}
