<?php

namespace Pos\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vat
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pos\ProductBundle\Entity\VatRepository")
 */
class Vat
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
     * @var float
     *
     * @ORM\Column(name="rate", type="float")
     */
    private $rate;


    /**
     *
     */
    public function __toString(){
        return $this->rate . " %";
    }

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
     * Set rate
     *
     * @param float $rate
     * @return Vat
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    
        return $this;
    }

    /**
     * Get rate
     *
     * @return float 
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set product
     *
     * @param \Pos\ProductBundle\Entity\Vat $product
     * @return Vat
     */
    public function setProduct(\Pos\ProductBundle\Entity\Vat $product)
    {
        $this->product = $product;
    
        return $this;
    }

    /**
     * Get product
     *
     * @return \Pos\ProductBundle\Entity\Vat 
     */
    public function getProduct()
    {
        return $this->product;
    }
}