<?php


namespace App\Entity;

// use Symfony\Component\Validator\Constraints as Assert;


class GiteSearch
{

    private  $minSurface;
    private  $maxBedrooms;
    private $equipements;
    



    /**
     * Get the value of minSurface
     */ 
    public function getMinSurface()
    {
        return $this->minSurface;
    }

    /**
     * Set the value of minSurface
     *
     * @return  self
     */ 
    public function setMinSurface(int $minSurface)
    {
        $this->minSurface = $minSurface;

        return $this;
    }

    /**
     * Get the value of maxBedrooms
     */ 
    public function getMaxBedrooms()
    {
        return $this->maxBedrooms;
    }

    /**
     * Set the value of maxBedrooms
     *
     * @return  self
     */ 
    public function setMaxBedrooms(int $maxBedrooms)
    {
        $this->maxBedrooms = $maxBedrooms;

        return $this;
    }

    /**
     * Get the value of equipements
     */ 
    public function getEquipements()
    {
        return $this->equipements;
    }

    /**
     * Set the value of equipements
     *
     * @return  self
     */ 
    public function setEquipements($equipements)
    {
        $this->equipements = $equipements;

        return $this;
    }
}