<?php

namespace baseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Genre
 *
 * @ORM\Table(name="Genre")
 * @ORM\Entity(repositoryClass="baseBundle\Repository\GenreRepository")
 */
class Genre
{
    // ...


    /**
     * @var integer
     *
     * @ORM\Column(name="id_genre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $idGenre;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", nullable=false)
     *
     */
    protected $type;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", nullable=false)
     *
     */
    protected $pays;

    /**
     * @return int
     */
    public function getIdGenre()
    {
        return $this->idGenre;
    }

    /**
     * @param int $idGenre
     */
    public function setIdGenre($idGenre)
    {
        $this->idGenre = $idGenre;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param string $pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    }

}


