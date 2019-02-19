<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetailMateriel
 *
 * @ORM\Table(name="detail_materiel", indexes={@ORM\Index(name="id_m", columns={"id_m"})})
 * @ORM\Entity
 */
class DetailMateriel
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_dm", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idDm;

    /**
     * @var \Materiels
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Materiels")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_m", referencedColumnName="id_matriel")
     * })
     */
    private $idM;

    /**
     * @return int
     */
    public function getIdDm()
    {
        return $this->idDm;
    }

    /**
     * @param int $idDm
     */
    public function setIdDm($idDm)
    {
        $this->idDm = $idDm;
    }

    /**
     * @return \Materiels
     */
    public function getIdM()
    {
        return $this->idM;
    }

    /**
     * @param \Materiels $idM
     */
    public function setIdM($idM)
    {
        $this->idM = $idM;
    }


}

