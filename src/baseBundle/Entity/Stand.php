<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stand
 *
 * @ORM\Table(name="stand")
 * @ORM\Entity
 */
class Stand
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_stand", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idStand;

    /**
     * @var integer
     *
     * @ORM\Column(name="statut_stand", type="integer", nullable=false)
     */
    private $statutStand;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @return int
     */
    public function getIdStand()
    {
        return $this->idStand;
    }

    /**
     * @param int $idStand
     */
    public function setIdStand($idStand)
    {
        $this->idStand = $idStand;
    }

    /**
     * @return int
     */
    public function getStatutStand()
    {
        return $this->statutStand;
    }

    /**
     * @param int $statutStand
     */
    public function setStatutStand($statutStand)
    {
        $this->statutStand = $statutStand;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


}

