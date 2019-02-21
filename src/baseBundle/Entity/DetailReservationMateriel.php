<?php

namespace baseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetailReservationMateriel
 *
 * @ORM\Table(name="detail_reservation_materiel", indexes={@ORM\Index(name="id_m", columns={"id_m"})})
 * @ORM\Entity
 */
class DetailReservationMateriel
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_drm", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idDrm;

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


}

