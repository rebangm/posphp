<?php

namespace Pos\ItemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Item
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Item
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
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="pricePurchase", type="float")
     */
    private $pricePurchase;

    /**
     * @var float
     *
     * @ORM\Column(name="priceSale", type="float")
     */
    private $priceSale;


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
     * Set description
     *
     * @param string $description
     * @return Item
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
     * Set pricePurchase
     *
     * @param float $pricePurchase
     * @return Item
     */
    public function setPricePurchase($pricePurchase)
    {
        $this->pricePurchase = $pricePurchase;
    
        return $this;
    }

    /**
     * Get pricePurchase
     *
     * @return float 
     */
    public function getPricePurchase()
    {
        return $this->pricePurchase;
    }

    /**
     * Set priceSale
     *
     * @param float $priceSale
     * @return Item
     */
    public function setPriceSale($priceSale)
    {
        $this->priceSale = $priceSale;
    
        return $this;
    }

    /**
     * Get priceSale
     *
     * @return float 
     */
    public function getPriceSale()
    {
        return $this->priceSale;
    }
}