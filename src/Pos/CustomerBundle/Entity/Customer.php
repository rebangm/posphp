<?php

namespace Pos\CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Customer
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pos\CustomerBundle\Entity\CustomerRepository")
 */
class Customer
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
     *      min = "1",
     *      max = "50",
     *      minMessage = "Votre nom doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre nom ne peut pas être plus long que {{ limit }} caractères")
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=60)
     * @Assert\Length(
     *      min = "1",
     *      max = "50",
     *      minMessage = "Votre prénom doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre prénom ne peut pas être plus long que {{ limit }} caractères")
     */
    private $lastName;
  
    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=16, nullable=true)
     */
    private $phoneNumber;
    
    /**
     * @var string
     *
     * @ORM\Column(name="mobile_number", type="string", length=16, nullable=true)
     */
    private $mobileNumber;
    
    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=120, nullable=true)
     * @Assert\Email(message="Adresse mail invalide")
     */
    private $mail;
    
    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=200, nullable=true)
     */
    private $address;
    
    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=200, nullable=true)
     */
    private $city;
    
    /**
     * @var string
     *
     * @ORM\Column(name="zip_code", type="string", length=200, nullable=true)
     */
    private $zipCode;
    
    /**
     * @var string
     * @ORM\Column(name="childbirth_date", type="date", nullable=true)
     * @Assert\Date()
     */
    private $childBirthDate;
    
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
     * @return Customer
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
     * @return Customer
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
     * Set phoneNumber
     *
     * @param string $phoneNumber
     * @return Customer
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    
        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string 
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return Customer
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    
        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set mobileNumber
     *
     * @param string $mobileNumber
     * @return Customer
     */
    public function setMobileNumber($mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;
    
        return $this;
    }

    /**
     * Get mobileNumber
     *
     * @return string 
     */
    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Customer
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Customer
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     * @return Customer
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    
        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string 
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set childBirthDate
     *
     * @param \DateTime $childBirthDate
     * @return Customer
     */
    public function setChildBirthDate($childBirthDate)
    {
        $this->childBirthDate = $childBirthDate;
    
        return $this;
    }

    /**
     * Get childBirthDate
     *
     * @return \DateTime 
     */
    public function getChildBirthDate()
    {
        return $this->childBirthDate;
    }
}