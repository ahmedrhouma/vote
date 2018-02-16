<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Electors
 *
 * @ORM\Table(name="electors")
 * @ORM\Entity
 */
class Electors
{
    /**
     * @var string
     *
     * @ORM\Column(name="First_name", type="string", length=45, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="Last_name", type="string", length=45, nullable=true)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="Language", type="string", length=45, nullable=true)
     */
    private $language;

    /**
     * @var integer
     *
     * @ORM\Column(name="NatNum", type="integer", nullable=true)
     */
    private $natnum;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Method", type="boolean", nullable=true)
     */
    private $method;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Ballot", mappedBy="electors")
     */
    private $ballot;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ballot = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

