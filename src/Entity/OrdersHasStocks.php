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
 * @ORM\Entity
 */
class OrdersHasStocks
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=6, scale=2, nullable=false, options={"comment"="prix de vente de ce produit pour cette commande"})
     */
    private $price;

    /**
     * @var \Stocks
     *
     * @ORM\ManyToOne(targetEntity="Stocks", inversedBy="orders_has_stocks")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stocks_id", referencedColumnName="id")
     * })
     */
    private $stocks;

    /**
     * @var \Orders
     *
     * @ORM\ManyToOne(targetEntity="Orders", inversedBy="orders_has_stocks")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="orders_id", referencedColumnName="id")
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
        $format = "OrdersHasStocks (Id: %s, Stock: %s, Order: %s;Price: %s)\n";
        return sprintf($format, $this->id, $this->stocks, $this->orders, $this->price);
    }
}
