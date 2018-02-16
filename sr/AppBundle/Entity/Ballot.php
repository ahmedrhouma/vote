<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ballot
 *
 * @ORM\Table(name="ballot", indexes={@ORM\Index(name="fk_Urne_Event_idx", columns={"Event_id"})})
 * @ORM\Entity
 */
class Ballot
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
     * @ORM\Column(name="Label", type="string", length=45, nullable=true)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=45, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Event
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Event")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Event_id", referencedColumnName="id")
     * })
     */
    private $event;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Electors", inversedBy="ballot")
     * @ORM\JoinTable(name="ballot_has_electors",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Ballot_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Electors_id", referencedColumnName="id")
     *   }
     * )
     */
    private $electors;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->electors = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

