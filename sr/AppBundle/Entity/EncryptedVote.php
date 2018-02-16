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
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Ballot
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Ballot")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Ballot_id", referencedColumnName="id")
     * })
     */
    private $ballot;


}

