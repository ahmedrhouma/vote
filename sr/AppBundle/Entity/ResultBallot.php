<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ResultBallot
 *
 * @ORM\Table(name="result_ballot")
 * @ORM\Entity
 */
class ResultBallot
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Number_vote", type="integer", nullable=true)
     */
    private $numberVote;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

