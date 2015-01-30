<?php

namespace SklepBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zamowienie
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Zamowienie
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
     * @ORM\Column(name="data", type="datetime")
     */
    private $data;

    /**
     * Jednokierunkowe połączenie z tabelą film, w razie usunięcia kategori zmieni na null
     * @ORM\OneToOne(targetEntity="Film")
     * @ORM\JoinColumn(name="film_id", referencedColumnName="id", onDelete="SET NULL")
     **/
    private $film;

    /**
     * Jeden użytkownik może wiele zamówień
     * W razie usunięcia użytkownika, zamówienie nie zniknie ale będzie bez użytkownia (null)
     * @ORM\ManyToOne(targetEntity="Uzytkownik", inversedBy="zamowienia")
     * @ORM\JoinColumn(name="uzytkownik_id", referencedColumnName="id", onDelete="SET NULL")
     **/
    private $uzytkownik;



    /*
    Wszystko nizej wygenerowało symfony
    */

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
     * Set data
     *
     * @param \DateTime $data
     * @return Zamowienie
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime 
     */
    public function getData()
    {
        return $this->data;
    }


    /**
     * Set uzytkownik
     *
     * @param \SklepBundle\Entity\Uzytkownik $uzytkownik
     * @return Zamowienie
     */
    public function setUzytkownik(\SklepBundle\Entity\Uzytkownik $uzytkownik = null)
    {
        $this->uzytkownik = $uzytkownik;

        return $this;
    }

    /**
     * Get uzytkownik
     *
     * @return \SklepBundle\Entity\Uzytkownik 
     */
    public function getUzytkownik()
    {
        return $this->uzytkownik;
    }

    /**
     * Set film
     *
     * @param \SklepBundle\Entity\Film $film
     * @return Zamowienie
     */
    public function setFilm(\SklepBundle\Entity\Film $film = null)
    {
        $this->film = $film;

        return $this;
    }

    /**
     * Get film
     *
     * @return \SklepBundle\Entity\Film 
     */
    public function getFilm()
    {
        return $this->film;
    }
}
