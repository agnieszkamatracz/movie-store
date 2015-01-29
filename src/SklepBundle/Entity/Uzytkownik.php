<?php

namespace SklepBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Uzytkownik
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SklepBundle\Entity\UzytkownikRepository")
 */
class Uzytkownik
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
     * @ORM\Column(name="login", type="string", length=255)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="haslo", type="string", length=255)
     */
    private $haslo;

    /**
     * @var integer
     *
     * @ORM\Column(name="ranga", type="integer")
     */
    private $ranga;


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
     * Set login
     *
     * @param string $login
     * @return Uzytkownik
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set haslo
     *
     * @param string $haslo
     * @return Uzytkownik
     */
    public function setHaslo($haslo)
    {
        $this->haslo = $haslo;

        return $this;
    }

    /**
     * Get haslo
     *
     * @return string 
     */
    public function getHaslo()
    {
        return $this->haslo;
    }

    /**
     * Set ranga
     *
     * @param integer $ranga
     * @return Uzytkownik
     */
    public function setRanga($ranga)
    {
        $this->ranga = $ranga;

        return $this;
    }

    /**
     * Get ranga
     *
     * @return integer 
     */
    public function getRanga()
    {
        return $this->ranga;
    }
}
