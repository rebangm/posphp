<?php

namespace Pos\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pos\ProductBundle\Entity\ProductRepository")
 */
class Product
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="purchasePrice", type="decimal")
     */
    private $purchasePrice;

    /**
     * @var string
     *
     * @ORM\Column(name="salesPrice", type="decimal")
     */
    private $salesPrice;

    /**
     * @var integer
     *
     * @ORM\Column(name="barcode", type="integer")
     */
    private $barcode;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="stockToSupply", type="integer")
     */
    private $stockToSupply;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="utilization", type="text")
     */
    private $utilization;

    /**
     * @var string
     *
     * @ORM\Column(name="typesetting", type="text")
     */
    private $typesetting;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var boolean
     *
     * @ORM\Column(name="restockingSupplier", type="boolean")
     */
    private $restockingSupplier;

    /**
     * @var integer
     *
     * @ORM\Column(name="bookedQuantity", type="integer")
     */
    private $bookedQuantity;

    /**
     * @var string
     *
     * @ORM\Column(name="vatRate", type="decimal")
     */
    private $vatRate;


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
     * Set purchasePrice
     *
     * @param string $purchasePrice
     * @return Product
     */
    public function setPurchasePrice($purchasePrice)
    {
        $this->purchasePrice = $purchasePrice;
    
        return $this;
    }

    /**
     * Get purchasePrice
     *
     * @return string 
     */
    public function getPurchasePrice()
    {
        return $this->purchasePrice;
    }

    /**
     * Set salesPrice
     *
     * @param string $salesPrice
     * @return Product
     */
    public function setSalesPrice($salesPrice)
    {
        $this->salesPrice = $salesPrice;
    
        return $this;
    }

    /**
     * Get salesPrice
     *
     * @return string 
     */
    public function getSalesPrice()
    {
        return $this->salesPrice;
    }

    /**
     * Set barcode
     *
     * @param integer $barcode
     * @return Product
     */
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;
    
        return $this;
    }

    /**
     * Get barcode
     *
     * @return integer 
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set stockToSupply
     *
     * @param integer $stockToSupply
     * @return Product
     */
    public function setStockToSupply($stockToSupply)
    {
        $this->stockToSupply = $stockToSupply;
    
        return $this;
    }

    /**
     * Get stockToSupply
     *
     * @return integer 
     */
    public function getStockToSupply()
    {
        return $this->stockToSupply;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set utilization
     *
     * @param string $utilization
     * @return Product
     */
    public function setUtilization($utilization)
    {
        $this->utilization = $utilization;
    
        return $this;
    }

    /**
     * Get utilization
     *
     * @return string 
     */
    public function getUtilization()
    {
        return $this->utilization;
    }

    /**
     * Set typesetting
     *
     * @param string $typesetting
     * @return Product
     */
    public function setTypesetting($typesetting)
    {
        $this->typesetting = $typesetting;
    
        return $this;
    }

    /**
     * Get typesetting
     *
     * @return string 
     */
    public function getTypesetting()
    {
        return $this->typesetting;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return Product
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
     * Set restockingSupplier
     *
     * @param boolean $restockingSupplier
     * @return Product
     */
    public function setRestockingSupplier($restockingSupplier)
    {
        $this->restockingSupplier = $restockingSupplier;
    
        return $this;
    }

    /**
     * Get restockingSupplier
     *
     * @return boolean 
     */
    public function getRestockingSupplier()
    {
        return $this->restockingSupplier;
    }

    /**
     * Set bookedQuantity
     *
     * @param integer $bookedQuantity
     * @return Product
     */
    public function setBookedQuantity($bookedQuantity)
    {
        $this->bookedQuantity = $bookedQuantity;
    
        return $this;
    }

    /**
     * Get bookedQuantity
     *
     * @return integer 
     */
    public function getBookedQuantity()
    {
        return $this->bookedQuantity;
    }

    /**
     * Set vatRate
     *
     * @param string $vatRate
     * @return Product
     */
    public function setVatRate($vatRate)
    {
        $this->vatRate = $vatRate;
    
        return $this;
    }

    /**
     * Get vatRate
     *
     * @return string 
     */
    public function getVatRate()
    {
        return $this->vatRate;
    }
}