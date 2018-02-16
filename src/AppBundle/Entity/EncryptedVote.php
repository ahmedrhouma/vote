<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EncryptedVote
 *
 * @ORM\Table(name="encrypted_vote", indexes={@ORM\Index(name="fk_Encrypted_vote_Ballot1_idx", columns={"Ballot_id"})})
 * @ORM\Entity
 */
class EncryptedVote
{
    /**
     * @var string
     *
     * @ORM\Column(name="Encrypted_vote", type="string", length=45, nullable=true)
     */
    private $encryptedVote;

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
     *   @ORM\JoinColumn(name="Ballot_id", referencedColumnName="id")
     * })
     */
    private $ballot;



    /**
     * Set encryptedVote
     *
     * @param string $encryptedVote
     *
     * @return EncryptedVote
     */
    public function setEncryptedVote($encryptedVote)
    {
        $this->encryptedVote = $encryptedVote;

        return $this;
    }

    /**
     * Get encryptedVote
     *
     * @return string
     */
    public function getEncryptedVote()
    {
        return $this->encryptedVote;
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
     * Set ballot
     *
     * @param \AppBundle\Entity\Ballot $ballot
     *
     * @return EncryptedVote
     */
    public function setBallot(\AppBundle\Entity\Ballot $ballot = null)
    {
        $this->ballot = $ballot;

        return $this;
    }

    /**
     * Get ballot
     *
     * @return \AppBundle\Entity\Ballot
     */
    public function getBallot()
    {
        return $this->ballot;
    }
}
