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
     * @var \stdClass
     *
     * @ORM\Column(name="film_id", type="object")
     */
    private $filmId;

    /**
     * Jeden użytkownik może wiele zamówień
     * W razie usunięcia użytkownika, zamówienie nie zniknie ale będzie bez użytkownia (null)
     * @ORM\ManyToOne(targetEntity="Uzytkownik", inversedBy="zamowienia")
     * @ORM\JoinColumn(name="uzytkownik_id", referencedColumnName="id", onDelete="SET NULL")
     **/
    private $uzytkownik;



    public function setUzytkownik($uzytkownik)
    {
        // Funkcja ustawiająca zamówienie w symfony
        $this->uzytkownik = $uzytkownik;
        return $this; 
    }

    public function getUzytkownik($uzytkownik)
    {
        //Funkcja zwraca zamówienie
        return $this->uzytkownik;
    }


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
     * Set filmId
     *
     * @param \stdClass $filmId
     * @return Zamowienie
     */
    public function setFilmId($filmId)
    {
        $this->filmId = $filmId;

        return $this;
    }

    /**
     * Get filmId
     *
     * @return \stdClass 
     */
    public function getFilmId()
    {
        return $this->filmId;
    }
}
