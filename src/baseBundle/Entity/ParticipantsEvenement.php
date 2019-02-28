<?php

namespace baseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParticipantsEvenement
 *
 * @ORM\Table(name="participants_evenement", indexes={@ORM\Index(name="id_evenement", columns={"id_evenement"}), @ORM\Index(name="id_stand", columns={"id_stand"})})
 * @ORM\Entity
 */
class ParticipantsEvenement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cin_participant", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cinParticipant;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=20, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", nullable=false)
     */
    private $prenom;

    /**
     * @var integer
     *
     * @ORM\Column(name="tel", type="integer", nullable=false)
     */
    private $tel;

    /**
     * @return int
     */
    public function getCinParticipant()
    {
        return $this->cinParticipant;
    }

    /**
     * @param int $cinParticipant
     */
    public function setCinParticipant($cinParticipant)
    {
        $this->cinParticipant = $cinParticipant;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return int
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param int $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return \Evenement
     */
    public function getIdEvenement()
    {
        return $this->idEvenement;
    }

    /**
     * @param \Evenement $idEvenement
     */
    public function setIdEvenement($idEvenement)
    {
        $this->idEvenement = $idEvenement;
    }

    /**
     * @return \Stand
     */
    public function getIdStand()
    {
        return $this->idStand;
    }

    /**
     * @param \Stand $idStand
     */
    public function setIdStand($idStand)
    {
        $this->idStand = $idStand;
    }

    /**
     * @var \Evenement
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Evenement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_evenement", referencedColumnName="id_evenement", onDelete ="CASCADE")
     * })
     */
    private $idEvenement;

    /**
     * @var \Stand
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Stand")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_stand", referencedColumnName="id_stand")
     * })
     */
    private $idStand;

}

