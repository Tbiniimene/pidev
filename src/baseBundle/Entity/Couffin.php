<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Couffin
 *
 * @ORM\Table(name="couffin", indexes={@ORM\Index(name="id_dc", columns={"id_dc"})})
 * @ORM\Entity
 */
class Couffin
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_couffin", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCouffin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_deb", type="date", nullable=false)
     */
    private $dateDeb;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date", nullable=false)
     */
    private $dateFin;

    /**
     * @var integer
     *
     * @ORM\Column(name="qte", type="integer", nullable=false)
     */
    private $qte;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=20, nullable=false)
     */
    private $type;

    /**
     * @var \DetailCouffin
     *
     * @ORM\ManyToOne(targetEntity="DetailCouffin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_dc", referencedColumnName="id_dc")
     * })
     */
    private $idDc;


}

