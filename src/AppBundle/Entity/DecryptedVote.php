<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DecryptedVote
 *
 * @ORM\Table(name="decrypted_vote", indexes={@ORM\Index(name="fk_Decrypted_vote_Encrypted_vote1_idx", columns={"Encrypted_vote_id"})})
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
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\EncryptedVote
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\EncryptedVote")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Encrypted_vote_id", referencedColumnName="id")
     * })
     */
    private $encryptedVote;



    /**
     * Set decryptedValue
     *
     * @param string $decryptedValue
     *
     * @return DecryptedVote
     */
    public function setDecryptedValue($decryptedValue)
    {
        $this->decryptedValue = $decryptedValue;

        return $this;
    }

    /**
     * Get decryptedValue
     *
     * @return string
     */
    public function getDecryptedValue()
    {
        return $this->decryptedValue;
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
     * Set encryptedVote
     *
     * @param \AppBundle\Entity\EncryptedVote $encryptedVote
     *
     * @return DecryptedVote
     */
    public function setEncryptedVote(\AppBundle\Entity\EncryptedVote $encryptedVote = null)
    {
        $this->encryptedVote = $encryptedVote;

        return $this;
    }

    /**
     * Get encryptedVote
     *
     * @return \AppBundle\Entity\EncryptedVote
     */
    public function getEncryptedVote()
    {
        return $this->encryptedVote;
    }
    public function __toString() {
        return $this->encryptedVote;
      }
}
