<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="orders_has_stocks",
 *      uniqueConstraints={
 *          @ORM\UniqueConstraint(name="orders_has_stocks_unique", columns={"orders_id", "stocks_id"})
 *      },
 *      indexes={
 *          @ORM\Index(name="fk_orders_has_stocks_stocks1_idx", columns={"stocks_id"}),
 *          @ORM\Index(name="fk_orders_has_stocks_orders1_idx", columns={"orders_id"})
 *      })
 * @ORM\Entity(repositoryClass=OrdersHasStocksRepository::class)
 */
class OrdersHasStocks
{
    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=6, scale=2, nullable=false, options={"comment"="prix de vente de ce produit pour cette commande"})
     */
    private $price;

    /**
     * @var \Stocks
     *
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Stocks", inversedBy="orders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stocks_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $stocks;

    /**
     * @var \Orders
     *
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Orders", inversedBy="stocks")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="orders_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $orders;


    /**
     * Constructor
     */
    public function __construct()
    {

    }

    public function __toString()
    {
        $format = "OrdersHasStocks (Stock: %s, Order: %s;Price: %s)\n";
        return sprintf($format, $this->stocks, $this->orders, $this->price);
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

    public function getStocks(): ?Stocks
    {
        return $this->stocks;
    }

    public function setStocks(?Stocks $stocks): self
    {
        $this->stocks = $stocks;

        return $this;
    }

    public function getOrders(): ?Orders
    {
        return $this->orders;
    }

    public function setOrders(?Orders $orders): self
    {
        $this->orders = $orders;

        return $this;
    }
}
