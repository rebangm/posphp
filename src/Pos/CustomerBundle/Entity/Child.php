<?php

namespace Pos\CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Child
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pos\CustomerBundle\Entity\ChildRepository")
 */
class Child
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
     * @ORM\Column(name="first_name", type="string", length=60)
     * @Assert\Length(
     *      min = "3",
     *      max = "50",
     *      minMessage = "le nom doit faire au moins {{ limit }} caractères",
     *      maxMessage = "le nom ne peut pas être plus long que {{ limit }} caractères")
     */
    private $firstName;


    /**
     * @var string
     * @ORM\Column(name="birth_date", type="date")
     * @Assert\Date()
     */
    private $birthDate;

    /**
     * @ORM\ManyToOne(targetEntity="Pos\CustomerBundle\Entity\Customer", inversedBy="child",  cascade={"persist"})
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id", nullable=false)
     */
    private $customer;

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
     * Set firstName
     *
     * @param string $firstName
     * @return Child
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     * @return Child
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set customer
     *
     * @param \Pos\CustomerBundle\Entity\Customer $customer
     * @return Child
     */
    public function setCustomer(\Pos\CustomerBundle\Entity\Customer $customer)
    {
        $this->customer = $customer;
    
        return $this;
    }

    /**
     * Get customer
     *
     * @return \Pos\CustomerBundle\Entity\Customer 
     */
    public function getCustomer()
    {
        return $this->customer;
    }
}