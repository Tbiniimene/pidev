<?php

namespace baseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Favoris
 *
 * @ORM\Table(name="favoris")
 * @ORM\Entity(repositoryClass="baseBundle\Repository\FavorisRepository")
 */
class Favoris
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_F", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_F;

    /**
     * @ORM\ManyToOne(targetEntity="baseBundle\Entity\User")
     * @ORM\JoinColumn(name="id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="baseBundle\Entity\Annonce",cascade={"persist"})
     * @ORM\JoinColumn(name="id_Annonce", referencedColumnName="id_Annonce", onDelete="CASCADE")
     */
    private $IdAnnonce;

    /**
     * @return int
     */
    public function getIdF()
    {
        return $this->id_F;
    }

    /**
     * @param int $id_F
     */
    public function setIdF($id_F)
    {
        $this->id_F = $id_F;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdAnnonce()
    {
        return $this->IdAnnonce;
    }

    /**
     * @param mixed $IdAnnonce
     */
    public function setIdAnnonce($IdAnnonce)
    {
        $this->IdAnnonce = $IdAnnonce;
    }



}

