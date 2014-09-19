<?php

namespace Pos\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderForm
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pos\ProductBundle\Entity\OrderFormRepository")
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
     * @var string
     *
     * @ORM\Column(name="SupplierProductId", type="string", length=255)
     */
    private $supplierProductId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="OrderDate", type="datetime")
     */
    private $orderDate;


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
     * Set supplierProductId
     *
     * @param string $supplierProductId
     * @return OrderForm
     */
    public function setSupplierProductId($supplierProductId)
    {
        $this->supplierProductId = $supplierProductId;
    
        return $this;
    }

    /**
     * Get supplierProductId
     *
     * @return string 
     */
    public function getSupplierProductId()
    {
        return $this->supplierProductId;
    }
}