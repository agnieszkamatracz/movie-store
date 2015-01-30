<?php
// src/Acme/UserBundle/Entity/User.php

namespace SklepBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="uzytkownik")
 * @ORM\Entity(repositoryClass="SklepBundle\Entity\UzytkownikRepository")
 */
class Uzytkownik extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
      * Jeden użytkownik może mieć wiele zamówień
      * @ORM\OneToMany(targetEntity="Zamowienie", mappedBy="uzytkownik")
      */
     protected $zamowienia;

    public function __construct()
    {
        parent::__construct();

        // your own logic
        $this->zamowienia = new ArrayCollection();
    }

    /**
     * Add zamowienia
     *
     * @param \SklepBundle\Entity\Zamowienie $zamowienia
     * @return Uzytkownik
     */
    public function addZamowienium(\SklepBundle\Entity\Zamowienie $zamowienia)
    {
        $this->zamowienia[] = $zamowienia;

        return $this;
    }

    /**
     * Remove zamowienia
     *
     * @param \SklepBundle\Entity\Zamowienie $zamowienia
     */
    public function removeZamowienium(\SklepBundle\Entity\Zamowienie $zamowienia)
    {
        $this->zamowienia->removeElement($zamowienia);
    }

    /**
     * Get zamowienia
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getZamowienia()
    {
        return $this->zamowienia;
    }
     
    /* 

    Wszystko poniżej zostało wygenerowane automatycznie przez symfony 

    */

}