<?php

namespace baseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetailCommande
 *
 * @ORM\Table(name="detail_commande", indexes={@ORM\Index(name="id_p", columns={"id_p"}), @ORM\Index(name="id_m", columns={"id_m"})})
 * @ORM\Entity
 */
class DetailCommande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_dc", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idDc;

    /**
     * @ORM\ManyToOne(targetEntity="Produits")
     * @ORM\JoinColumn(name="id_p",referencedColumnName="id_produit")
     */
    private $idP;

    /**
     * @ORM\ManyToOne(targetEntity="Materiels")
     * @ORM\JoinColumn(name="id_m",referencedColumnName="id_matriel")
     */
    private $idM;

    /**
     * @var integer
     *
     * @ORM\Column(name="qte", type="integer", nullable=false)
     */
    private $qte;

    /**
     * @return int
     */
    public function getIdDc()
    {
        return $this->idDc;
    }

    /**
     * @param int $idDc
     */
    public function setIdDc($idDc)
    {
        $this->idDc = $idDc;
    }

    /**
     * @return \Produits
     */
    public function getIdP()
    {
        return $this->idP;
    }

    /**
     * @param \Produits $idP
     */
    public function setIdP($idP)
    {
        $this->idP = $idP;
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

    /**
     * @return int
     */
    public function getQte()
    {
        return $this->qte;
    }

    /**
     * @param int $qte
     */
    public function setQte($qte)
    {
        $this->qte = $qte;
    }


}

