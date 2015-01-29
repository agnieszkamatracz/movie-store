<?php

namespace SklepBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Film
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SklepBundle\Entity\FilmRepository")
 */
class Film
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
     * @ORM\Column(name="tytul", type="string", length=255)
     */
    private $tytul;

    /**
     * @var string
     *
     * @ORM\Column(name="cena", type="decimal")
     */
    private $cena;

    /**
     * @var string
     *
     * @ORM\Column(name="opis", type="string", length=255)
     */
    private $opis;

    /**
     * @var string
     *
     * @ORM\Column(name="aktorzy", type="string", length=255)
     */
    private $aktorzy;

    /**
     * Jednokierunkowe połączenie z tabelą kategoria, w razie usunięcia kategori zmieni na null
     * @ORM\OneToOne(targetEntity="Kategoria")
     * @ORM\JoinColumn(name="kategoria_id", referencedColumnName="id", onDelete="SET NULL")
     **/
    private $kategoria;

    //Ustawiamy kategorie
    public function setKategoria($kategoria)
    {
        $this->kategoria = $kategoria;

        return $this;
    }

    public function getKategoria()
    {
        return $this->kategoria;
    }

    /*
    Wszystko niżej wygnerowało symfony
    *



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
     * Set tytul
     *
     * @param string $tytul
     * @return Film
     */
    public function setTytul($tytul)
    {
        $this->tytul = $tytul;

        return $this;
    }

    /**
     * Get tytul
     *
     * @return string 
     */
    public function getTytul()
    {
        return $this->tytul;
    }

    /**
     * Set cena
     *
     * @param string $cena
     * @return Film
     */
    public function setCena($cena)
    {
        $this->cena = $cena;

        return $this;
    }

    /**
     * Get cena
     *
     * @return string 
     */
    public function getCena()
    {
        return $this->cena;
    }

    /**
     * Set opis
     *
     * @param string $opis
     * @return Film
     */
    public function setOpis($opis)
    {
        $this->opis = $opis;

        return $this;
    }

    /**
     * Get opis
     *
     * @return string 
     */
    public function getOpis()
    {
        return $this->opis;
    }

    /**
     * Set aktorzy
     *
     * @param string $aktorzy
     * @return Film
     */
    public function setAktorzy($aktorzy)
    {
        $this->aktorzy = $aktorzy;

        return $this;
    }

    /**
     * Get aktorzy
     *
     * @return string 
     */
    public function getAktorzy()
    {
        return $this->aktorzy;
    }
}
