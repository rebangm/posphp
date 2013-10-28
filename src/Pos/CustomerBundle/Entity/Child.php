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
   * @ORM\ManyToOne(targetEntity="Pos\CustomerBundle\Entity\Customer")
   * @ORM\JoinColumn(nullable=false)
   */
    
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
     *      min = "1",
     *      max = "50",
     *      minMessage = "le nom doit faire au moins {{ limit }} caractères",
     *      maxMessage = "le nom ne peut pas être plus long que {{ limit }} caractères")
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=60)
     * @Assert\Length(
     *      min = "1",
     *      max = "50",
     *      minMessage = "le prénom doit faire au moins {{ limit }} caractères",
     *      maxMessage = "le prénom ne peut pas être plus long que {{ limit }} caractères")
     */
    private $lastName;
    
    /**
     * @var string
     * @ORM\Column(name="birth_date", type="date")
     * @Assert\Date()
     */
    private $birthDate;
    
    
    
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
     * Set lastName
     *
     * @param string $lastName
     * @return Child
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
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
}