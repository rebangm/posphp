<?php

namespace Pos\SaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderForm
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pos\SaleBundle\Entity\OrderFormRepository")
 */
class OrderForm
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
     * @var \DateTime
     *
     * @ORM\Column(name="OrderDate", type="datetime")
     */
    private $orderDate;

    /**
     * @var string
     *
     * @ORM\Column(name="TotalPrice", type="decimal")
     */
    private $totalPrice;

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
     * Set orderDate
     *
     * @param \DateTime $orderDate
     * @return OrderForm
     */
    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;
    
        return $this;
    }

    /**
     * Get orderDate
     *
     * @return \DateTime 
     */
    public function getOrderDate()
    {
        return $this->orderDate;
    }

    /**
     * Set totalPrice
     *
     * @param string $totalPrice
     * @return OrderForm
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    
        return $this;
    }

    /**
     * Get totalPrice
     *
     * @return string 
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }
}