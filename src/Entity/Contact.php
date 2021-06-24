<?php

namespace App\Entity;

use App\Entity\Gite;
use Symfony\Component\Validator\Constraints as Assert;


class Contact 
{
    /**
     * @Assert\NotBlank()
     * @Assert\Length(min = 3, max = 20)
     */
    private string $firstName;


    /**
     * @Assert\NotBlank()
     * @Assert\Length(min = 3, max = 20)
     */
    private string $lastName;


    /**
     * @Assert\NotBlank()
     * @Assert\Length(min = 3, max = 20)
     */
    private string $email;


    /**
     * @Assert\NotBlank()
     * @Assert\Length(min = 10, max = 10)
     */
    private string $phone;


    /**
     * @Assert\NotBlank()
     * @Assert\Length(min = 10, max = 500)
     */
    private string $message;



    private Gite $gite;



    /**
     * Get the value of firstName
     */ 
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */ 
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of lastName
     */ 
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */ 
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }


/**
 * Get the value of gite
 * @return self
 */
    public function getGite()
    {
        return $this->gite;
    }

    /**Set the value of gite
     * 
     */
    public function setGite(Gite $gite)
    {
        $this->gite = $gite;

        return $this;
    }
}
