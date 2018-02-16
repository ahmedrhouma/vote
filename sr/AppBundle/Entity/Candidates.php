<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Candidates
 *
 * @ORM\Table(name="candidates", indexes={@ORM\Index(name="fk_Candidates_Ballot1_idx", columns={"Ballot_id"}), @ORM\Index(name="fk_Candidates_Result_Ballot1_idx", columns={"Result_Ballot_id"})})
 * @ORM\Entity
 */
class Candidates
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

    /**
     * @var \AppBundle\Entity\ResultBallot
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\ResultBallot")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Result_Ballot_id", referencedColumnName="id")
     * })
     */
    private $resultBallot;


}

