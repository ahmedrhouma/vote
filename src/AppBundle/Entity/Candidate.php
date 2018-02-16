<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Candidate
 *
 * @ORM\Table(name="candidate", indexes={@ORM\Index(name="fk_Candidates_Ballot1_idx", columns={"Ballot_id1"})})
 * @ORM\Entity
 */
class Candidate
{
    /**
     * @var string
     *
     * @ORM\Column(name="Language", type="string", length=45, nullable=true)
     */
    private $language;

    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=45, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="Liste", type="string", length=45, nullable=true)
     */
    private $liste;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Ballot
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ballot")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Ballot_id1", referencedColumnName="id")
     * })
     */
    private $ballot1;



    /**
     * Set language
     *
     * @param string $language
     *
     * @return Candidate
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Candidate
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set liste
     *
     * @param string $liste
     *
     * @return Candidate
     */
    public function setListe($liste)
    {
        $this->liste = $liste;

        return $this;
    }

    /**
     * Get liste
     *
     * @return string
     */
    public function getListe()
    {
        return $this->liste;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ballot1
     *
     * @param \AppBundle\Entity\Ballot $ballot1
     *
     * @return Candidate
     */
    public function setBallot1(\AppBundle\Entity\Ballot $ballot1 = null)
    {
        $this->ballot1 = $ballot1;

        return $this;
    }

    /**
     * Get ballot1
     *
     * @return \AppBundle\Entity\Ballot
     */
    public function getBallot1()
    {
        return $this->ballot1;
    }
}
