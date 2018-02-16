<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DecryptedVote
 *
 * @ORM\Table(name="decrypted_vote", indexes={@ORM\Index(name="fk_Decrypted_vote_Encrypted_vote1_idx", columns={"Encrypted_vote_id", "Encrypted_vote_Ballot_id"}), @ORM\Index(name="IDX_F78D9BF323A17606", columns={"Encrypted_vote_id"})})
 * @ORM\Entity
 */
class DecryptedVote
{
    /**
     * @var string
     *
     * @ORM\Column(name="Decrypted value", type="string", length=45, nullable=true)
     */
    private $decryptedValue;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="Encrypted_vote_Ballot_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $encryptedVoteBallotId;

    /**
     * @var \AppBundle\Entity\EncryptedVote
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\EncryptedVote")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Encrypted_vote_id", referencedColumnName="id")
     * })
     */
    private $encryptedVote;


}

