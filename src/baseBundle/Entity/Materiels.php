<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Materiels
 *
 * @ORM\Table(name="materiels")
 * @ORM\Entity
 */
class Materiels
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_matriel", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMatriel;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=20, nullable=false)
     */
    private $nom;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="qte", type="integer", nullable=false)
     */
    private $qte;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=20, nullable=false)
     */
    private $statut;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=20, nullable=false)
     */
    private $type;


}

