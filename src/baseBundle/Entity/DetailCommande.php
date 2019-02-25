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
     * @var integer
     *
     * @ORM\Column(name="id_p", type="integer", nullable=true)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idP;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_m", type="integer", nullable=true)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idM;

    /**
     * @var integer
     *
     * @ORM\Column(name="qte", type="integer", nullable=false)
     */
    private $qte;


}

