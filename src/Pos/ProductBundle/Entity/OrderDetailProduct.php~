<?php

namespace Pos\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderDetailProduct
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pos\ProductBundle\Entity\OrderDetailProductRepository")
 */
class OrderDetailProduct
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Pos\ProductBundle\Entity\Product")
     */
    private $product;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Pos\ProductBundle\Entity\OrderForm")
     */
    private $orderForm;

    /**
     * @var integer
     *
     * @ORM\Column(name="Quantity", type="integer")
     */
    private $quantity;

    /**
     * @var float
     *
     * @ORM\Column(name="UnitPrice", type="float")
     */
    private $unitPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="Discount", type="decimal")
     */
    private $discount;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return OrderDetailProduct
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    
        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set discount
     *
     * @param string $discount
     * @return OrderDetailProduct
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    
        return $this;
    }

    /**
     * Get discount
     *
     * @return string 
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set unitPrice
     *
     * @param float $unitPrice
     * @return OrderDetailProduct
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
    
        return $this;
    }

    /**
     * Get unitPrice
     *
     * @return float 
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * Set product
     *
     * @param \Pos\ProductBundle\Entity\Product $product
     * @return OrderDetailProduct
     */
    public function setProduct(\Pos\ProductBundle\Entity\Product $product)
    {
        $this->product = $product;
    
        return $this;
    }

    /**
     * Get product
     *
     * @return \Pos\ProductBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set orderForm
     *
     * @param \Pos\ProductBundle\Entity\OrderForm $orderForm
     * @return OrderDetailProduct
     */
    public function setOrderForm(\Pos\ProductBundle\Entity\OrderForm $orderForm)
    {
        $this->orderForm = $orderForm;
    
        return $this;
    }

    /**
     * Get orderForm
     *
     * @return \Pos\ProductBundle\Entity\OrderForm 
     */
    public function getOrderForm()
    {
        return $this->orderForm;
    }
}