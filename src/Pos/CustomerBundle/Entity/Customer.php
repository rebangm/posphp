<?php

namespace Pos\CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Customer
 *
 * @ORM\Table()
 * @ORM\Entity
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
     * @ORM\Column(name="user_name", type="string", length=50, unique=true)
     * @Assert\Length(
     *      min = "5",
     *      max = "50",
     *      minMessage = "Votre login doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre login ne peut pas être plus long que {{ limit }} caractères")
     * @Assert\NotBlank()
     */
    private $username;
  
    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=16, nullable=true)
     */
    private $phoneNumber;
    
        
    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=120)
     * @Assert\Email(message="Adresse mail invalide")
     */
    private $mail;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
